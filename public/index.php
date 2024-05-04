<?php

require "../app/Core/Core.php";
require "../app/Controller/HomeController.php";
require "../app/Controller/ErroController.php";
require "../app/Model/Tarefa.php";
require "../lib/Database/Connection.php";

$template = file_get_contents("../app/Template/nova_tarefa.php");

$core = new Core();
$core->start($_GET);

echo $template;