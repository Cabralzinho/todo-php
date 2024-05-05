<?php 

class AdicionarController {
    public function index() {
        try {
            $loader = new \Twig\Loader\FilesystemLoader('../app/View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load("adicionar_tarefa.html");
            $conteudo = $template->render();

            echo $conteudo;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function criar() {
        try {
            TarefaModel::adicionarTarefa();

            return header("Location: ?pagina=home");
        }
        catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}