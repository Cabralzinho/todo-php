<?php

class EditarController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../app/View');
        $twig = new \Twig\Environment($loader);
        $twig->addGlobal("id", $_GET["id"]);
        $twig->addGlobal("error", $_GET["error"]);

        $template = $twig->load("editar.html");

        $conteudo = $template->render();

        echo $conteudo;
    }

    public function editar()
    {
        try {
            if (empty($_POST["descricao"])) {
                $id = $_GET["id"];
                $error = "O campo não pode está vazio";
                return header("Location: ?pagina=editar&id=$id&error=$error");
            }

            TarefaModel::editarTarefa();

            header("Location: ?pagina=todas");
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
