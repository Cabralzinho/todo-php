<?php 

require "./Database.php";

$database = new Database();

$query = "DELETE FROM lista_tarefa WHERE id = :id";

$PrepareTarefa = $database->conectar()->prepare($query);

$excluirTarefa = $PrepareTarefa->execute([
    ":id" => $_GET["exclusao"]
]);

header("Location: ./index.php");