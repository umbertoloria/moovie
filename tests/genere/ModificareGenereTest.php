<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGenereDAO.php";

class ModificareGenereTest extends GenericTest {

    // --do-not-cache-result

    private static $account_dao;
    private static $account2_dao;
    private static $genere_dao;
    private static $userid;
    private static $user2id;
    private static $genereid;

    public static function setUpBeforeClass(): void {
        Testing::init();
//		AccountDAOFactory::useStub();
        self::$account_dao = AccountDAOFactory::getAccountDAO();
        self::$account2_dao = AccountDAOFactory::getAccountDAO();
        self::$genere_dao = GenereDAOFactory::getGenereDAO();
        $real_utente = self::$account_dao->create(
            new Utente(0, "Giuseppe", "Verdi", "g.verdi@gmail.com", sha1("140898")));
        $real2_utente = self::$account_dao->create(
            new Utente(0, "Giuseppe", "Antoniani", "g.antoniani@gmail.com", sha1("140898"), true));
        $real_genere = self::$genere_dao->create(
            new Genere(0, "Fantasioso"));
        self::$userid = $real_utente->getID();
        self::$user2id = $real2_utente->getID();
        self::$genereid = $real_genere->getID();
    }

    public static function tearDownAfterClass(): void {
        if (self::$userid !== null)
            self::$account_dao->delete(self::$userid);
        if (self::$user2id !== null)
            self::$account2_dao->delete(self::$user2id);
        if(self::$genereid !== null)
            self::$genere_dao->delete(self::$genereid);
    }

    private function callController($user_id, $nome, $genere) {
        $_COOKIE["userid"] = $user_id;
        Auth::init();
        $_POST["nome"] = $nome;
        $_POST["genere_id"] = $genere;
        ob_start();
        include "../../controllers/gestione/Modifica genere.php";
        $response = ob_get_contents();
        ob_end_clean();
        return $response;
    }

    public function test_TC_5_4_1() {
        $response = $this->callController(null, "Animazione", self::$genereid);
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }

    public function test_TC_5_4_2() {
        $response = $this->callController(self::$userid, "Animazione", self::$genereid);
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }

    public function test_TC_5_4_3() {
        $response = $this->callController(self::$user2id, "", self::$genereid);
        $this->assertTrue(
            Testing::assert_block($response)
        );
    }

    public function test_TC_5_4_4() {
        $response = $this->callController(self::$user2id, "Comico", self::$genereid);
        $this->assertTrue(
            Testing::assert_message($response, "Questo nome è associato ad un genere esistente")
        );
    }

    public function test_TC_5_4_5() {
        $response = $this->callController(self::$user2id, "Animalista", self::$genereid);
        $this->assertTrue(
            Testing::assert_redirect($response, "/genere.php?id=" . self::$genereid)
        );

    }

}