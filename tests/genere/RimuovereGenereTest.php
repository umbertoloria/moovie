<?php

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubAccountDAO.php";
include_once "../stubs/StubGenereDAO.php";

class RimuovereGenereTest extends GenericTest {

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
    }

    private function callController($user_id, $genere) {
        $_COOKIE["userid"] = $user_id;
        Auth::init();
        $_POST["genere_id"] = $genere;
        ob_start();
        include "../../controllers/gestione/Rimuovi genere.php";
        $response = ob_get_contents();
        ob_end_clean();
        return $response;
    }

    public function test_TC_5_5_1() {
        $response = $this->callController(null, self::$genereid);
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }

    public function test_TC_5_5_2() {
        $response = $this->callController(self::$userid, self::$genereid);
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }

    public function test_TC_5_5_3() {
        $response = $this->callController(self::$user2id, self::$genereid);
        $this->assertTrue(
            Testing::assert_redirect($response, "/")
        );
    }



}