<?php

class Database {
    private $host = "127.0.0.1";
    private $dbname = "todo_list";
    private $user = "root";
    private $password = "";

    public function conectar() {
        try {
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    
            return $conexao;
        }
        catch (PDOException $error) {
            echo "Algo deu errado: {$error->getMessage()}";
        }
    }
}