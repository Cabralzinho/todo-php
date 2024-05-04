<?php

abstract class Connection
{
    private static $conexao;

    public static function getConexao()
    {
        if (self::$conexao == null) {
            self::$conexao =  new PDO("mysql:host=127.0.0.1;dbname=todo_list", "root", "");
        }

        return self::$conexao;
    }
}
