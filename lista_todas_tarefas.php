<?php 

require "./Database.php";

$database = new Database();

$query = "SELECT * FROM lista_tarefa";

$listTarefas = $database->conectar()->query($query)->fetchAll(PDO::FETCH_ASSOC);