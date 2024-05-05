<?php 

class TodasController {
    public static function index() {
        try {
            $todasTarefas = TarefaModel::obtertodos();

            $loader = new \Twig\Loader\FilesystemLoader('../app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load("todas_tarefas.html");

            $parametros = [];
            $parametros["tarefas"] = $todasTarefas;

            $conteudo = $template->render($parametros);

            echo $conteudo;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}