<?php 

require "./Database.php";

$database = new Database();

$query = "UPDATE lista_tarefa set pendencias = FALSE WHERE id = :id";

$prepareList = $database->conectar()->prepare($query);

$prepareList->execute([
    ":id" => $_GET["completado"]
]);

header("Location: ./index.php");