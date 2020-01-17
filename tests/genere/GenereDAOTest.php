<?php
/** @noinspection PhpDocSignatureInspection */

include_once "../../php/core.php";
include_once "../GenericTest.php";
include_once "../stubs/StubGenereDAO.php";

class GenereDAOTest extends GenericTest {

    /** @var IGenereDAO */
    private static $genere_dao;
    /** @var Genere[] */
    private static $saves = [];

    public static function setUpBeforeClass(): void {
        GenereDAOFactory::useStub();
        self::$genere_dao = GenereDAOFactory::getGenereDAO();
    }

    private function assertMatches($result, $oracle){
        $this->assertEquals($result->getNome(), $oracle[0]);
    }

    public function generiUguali(Genere $genere1, Genere $genere2){
        return $genere1->getNome() == $genere2->getNome();
    }

    public function create_genere_provider() {
        return [
            'genere' => ["Fantascienzoso", ["Fantascienzoso"]]
        ];
    }

    /** @dataProvider create_genere_provider */
    public function testCreateGenere($nome, $oracle){
        $genere = new Genere(0, $nome);
        $result =  self::$genere_dao->create($genere);
        if(empty($oracle)){
            $this->assertNull($result);
        }else
        {
            $this->assertMatches($result, $oracle);
        }
    }

    public function update_genere_provider(){
        return[
            'genere'=> [1, "Horrorissimo", ["Horrorissimo"]],
        ];
    }

    /** @dataProvider update_genere_provider */
    public function testUpdateGenere($id, $nomenuovo, $oracolo){
        $genere = self::$genere_dao->get_from_id($id);
        if(empty($oracolo)){
            $this->assertNull($genere);
        }else{
            $this->assertNotNull($genere);
            $genere->setNome($nomenuovo);
            $result = self::$genere_dao->update($genere);
            $this->assertMatches($result, $oracolo);
        }
    }

    public function delete_genere_provider(){
        return[
            'genere' => [1, true],
            'genere non rimosso' =>[2, false]
        ];
    }

    /** @dataProvider delete_genere_provider */
    public function testDeleteUser($id, $oracolo){
        $result = self::$genere_dao->delete($id);
        $this->assertEquals($result, $oracolo);
        $this->assertNull(self::$genere_dao->get_from_id($id));
    }

}
