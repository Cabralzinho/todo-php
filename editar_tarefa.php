<?php 

require "./Database.php";

$database = new Database();

$query = "UPDATE lista_tarefa SET descricao = :descricao WHERE id = :id";

$prepareList = $database->conectar()->prepare($query);

$prepareList->execute([
    ":descricao" => $_POST["descricao"],
    ":id" => $_GET["editar"]
]);

header("Location: index.php");