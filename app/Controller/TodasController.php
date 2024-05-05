<?php 

class TodasController {
    public static function index() {
        try {
            $todasTarefas = TarefaModel::obtertodos();

            $loader = new \Twig\Loader\FilesystemLoader('../app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load("todas_tarefas.html");

            $parametros["tarefas"] = $todasTarefas;
            
            $conteudo = $template->render($parametros);

            echo $conteudo;
        }
        catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public static function excluir() {
        try {
            TarefaModel::excluirTarefa();

            return header("Location: ?pagina=todas");
        }
        catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public static function concluir() {
        try {
            TarefaModel::concluirTarefa();

            return header("Location: ?pagina=todas");
        }
        catch (Exception $error) {
            $error->getMessage();
        }
    }

    public static function pendencia() {
        try {
            TarefaModel::pendenciasTarefas();

            return header("Location: ?pagina=todas");
        }
        catch (Exception $error) {
            $error->getMessage();
        }
    }
}