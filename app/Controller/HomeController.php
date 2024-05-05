<?php

class HomeController
{
    public function index()
    {
        try {
            $colecaoTarefas = TarefaModel::obterIncompletas();

            $loader = new \Twig\Loader\FilesystemLoader('../app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load("home.html");

            $parametros = [];
            $parametros["tarefas"] = $colecaoTarefas;

            $conteudo = $template->render($parametros);

            echo $conteudo;
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public function excluir()
    {
        try {
            TarefaModel::excluirTarefa();

            return header("Location: /");
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public function concluir()
    {
        try {
            TarefaModel::concluirTarefa();

            return header("Location: /");
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
