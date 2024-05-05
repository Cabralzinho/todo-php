<?php

class TarefaModel
{
    public static function obtertodos() {
        $connection = Connection::getConexao();
        
        $query = "SELECT * FROM lista_tarefa ORDER BY id DESC";
        $query = $connection->prepare($query);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if(!$result) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }

        return $result;
    }

    public static function obterIncompletas()
    {
        $connection = Connection::getConexao();

        $query = "SELECT * FROM lista_tarefa WHERE pendencias = 1 ORDER BY id DESC";
        $query = $connection->prepare($query);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }

        return $result;
    }

    public static function adicionarTarefa() {
        $connection = Connection::getConexao();

        $query = "INSERT INTO lista_tarefa(descricao) VALUES(:descricao)";
        $query = $connection->prepare($query);
        
        $adicionar = $query->execute([
            ":descricao" => $_POST["descricao"]
        ]);

        return $adicionar;
    }

    public static function editarTarefa() {
        $connection = Connection::getConexao();

        $query = "UPDATE lista_tarefa SET descricao = :descricao WHERE id = :id ";
        $query = $connection->prepare($query);

        $editar =  $query->execute([
            ":descricao" => $_POST["descricao"],
            ":id" => $_GET["id"]
        ]);

        if(empty($editar)) {
            throw new Exception("O campo não pode está vazio");
        }

        return $editar;
    }
}
