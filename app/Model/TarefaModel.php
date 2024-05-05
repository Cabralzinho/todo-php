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

    public static function excluirTarefa() {
        $connection = Connection::getConexao();

        $query = "DELETE FROM lista_tarefa WHERE id = :id";
        $query = $connection->prepare($query);

        $excluir = $query->execute([
            ":id" => $_GET["id"]
        ]);

        return $excluir;
    }

    public static function editarTarefa() {
        $connection = Connection::getConexao();

        $query = "UPDATE lista_tarefa SET descricao = :descricao WHERE id = :id ";
        $query = $connection->prepare($query);

        $editar =  $query->execute([
            ":descricao" => $_POST["descricao"],
            ":id" => $_GET["id"]
        ]);

        return $editar;
    }

    public static function concluirTarefa() {
        $connection = Connection::getConexao();

        $query = "UPDATE lista_tarefa SET pendencias = 0 WHERE id = :id";
        $query = $connection->prepare($query);

        $concluir = $query->execute([
            ":id" => $_GET["id"] 
        ]);

        return $concluir;
    }

    public static function pendenciasTarefas() {
        $connection = Connection::getConexao();

        $query = "UPDATE lista_tarefa SET pendencias = 1 WHERE id = :id";
        $query = $connection->prepare($query);
        
        $pendencias = $query->execute([
            ":id" => $_GET["id"]
        ]);

        return $pendencias;
    }
}
