<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGenereDAO.php";

class AggiungereGenereTest extends GenericTest {

    // --do-not-cache-result

    private static $account_dao;
    private static $account2_dao;
    private static $genere_dao;
    private static $userid;
    private static $user2id;
    private static $genereid;

    public static function setUpBeforeClass(): void {
        Testing::init();
		//AccountDAOFactory::useStub();
		//GenereDAOFactory::useStub(); //affiché possa funzionare il test con gli stub bisogna creare un nuovo genere (che sarà contenuto nello stub) chiamato "comico", decommentare le righe 30 e 31
        self::$account_dao = AccountDAOFactory::getAccountDAO();
        self::$account2_dao = AccountDAOFactory::getAccountDAO();
        self::$genere_dao = GenereDAOFactory::getGenereDAO();
        $real_utente = self::$account_dao->create(
            new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898")));
        $real2_utente = self::$account_dao->create(
            new Utente(0, "Giuseppe", "Antoniani", "g.antoniani@gmail.com", sha1("140898"), true));
       // $real_genere = self::$genere_dao->create(
         //   new Genere(0, "Comico"));
        self::$userid = $real_utente->getID();
        self::$user2id = $real2_utente->getID();
        self::$genereid = null;
    }

    public static function tearDownAfterClass(): void {
        if (self::$userid !== null)
            self::$account_dao->delete(self::$userid);
        if (self::$user2id !== null)
            self::$account2_dao->delete(self::$user2id);
        if(self::$genereid !== null)
            self::$genere_dao->delete(self::$genereid);
    }

    private function callController($user_id, $nome) {
        $_COOKIE["userid"] = $user_id;
        Auth::init();
        $_POST["nome"] = $nome;
        ob_start();
        include "../../controllers/gestione/Aggiungi genere.php";
        $response = ob_get_contents();
        ob_end_clean();
        self::$genereid = DB::lastInsertedID();
        return $response;
    }

    public function test_TC_5_3_1() {
        $response = $this->callController(null, "Animazione");
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }

    public function test_TC_5_3_2() {
        $response = $this->callController(self::$userid, "Animazione");
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }

    public function test_TC_5_3_3() {
        $response = $this->callController(self::$user2id, "");
        $this->assertTrue(
            Testing::assert_block($response)
        );
    }

    public function test_TC_5_3_4() {
        $response = $this->callController(self::$user2id, "Comico");
        $this->assertTrue(
            Testing::assert_message($response, "Questo nome è associato ad un genere esistente")
        );
    }

    public function test_TC_5_3_5() {
        $response = $this->callController(self::$user2id, "Fantasioso");
        $arrayRit = self::$genere_dao->get_all();
        foreach ($arrayRit as $arr){
            assert($arr instanceof Genere);
            if($arr->getNome() === "Fantasioso"){
                self::$genereid = $arr->getID();
            }
        }
        $this->assertTrue(
            Testing::assert_redirect($response,"/genere.php?id=" . self::$genereid)
        );

    }

}