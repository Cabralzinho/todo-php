<?php

require "./Database.php";

if (empty($_POST["descricao"])) {
    $error = "A descrição não pode está vazio";

    header("Location: nova_tarefa.php?error=$error");
}

$database = new Database();

$query = "INSERT INTO lista_tarefa(descricao) VALUES(:descricao)";

$prepareList = $database->conectar()->prepare($query);

$prepareList->execute([
    ":descricao" => $_POST["descricao"]
]);

header("Location: nova_tarefa.php?inserido=success");