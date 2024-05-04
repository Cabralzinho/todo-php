<?php

class Tarefa
{
    public static function selecionaIncompleto()
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
}
