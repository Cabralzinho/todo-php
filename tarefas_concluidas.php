<?php 

require "./Database.php";

$database = new Database();

$query = "SELECT * FROM lista_tarefa WHERE pendencias = 0 ORDER BY id DESC";

$listTarefas = $database->conectar()->query($query)->fetchAll(PDO::FETCH_ASSOC);