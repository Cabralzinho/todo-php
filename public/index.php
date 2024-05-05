<?php

require "../app/Core/Core.php";
require "../lib/Database/Connection.php";
require "../vendor/autoload.php";

require "../app/Controller/HomeController.php";
require "../app/Controller/ErroController.php";
require "../app/Controller/AdicionarController.php";
require "../app/Controller/TodasController.php";
require "../app/Controller/EditarController.php";

require "../app/Model/TarefaModel.php";


$template = file_get_contents("../app/Template/template.html");
ob_start();
$core = new Core();
$core->start($_GET);
$saida = ob_get_contents();
ob_end_clean();

$templatePronto = str_replace("{{conteudo dinamico}}", $saida, $template);

echo $templatePronto;