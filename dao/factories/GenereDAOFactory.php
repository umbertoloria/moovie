<?php

class GenereDAOFactory {

    private static $stub = null;

    public static function useStub() {
        self::$stub = new StubGenereDAO();
    }

    public static function getGenereDAO(): IGenereDAO {
        if (self::$stub)
            return self::$stub;
        else
            return new DBGenereDAo;
    }

}