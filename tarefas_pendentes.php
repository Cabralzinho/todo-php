<?php 

require "./Database.php";

$database = new Database();

$query = "SELECT * FROM lista_tarefa WHERE pendencias = 1 ORDER BY id DESC";

$sql = $database->conectar()->prepare($query);
$sql->execute();

$descricao = $sql->fetchAll(PDO::FETCH_ASSOC);