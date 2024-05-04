<?php

class HomeController
{
    public function index()
    {
        try {
            $colecaoTarefas = Tarefa::selecionaIncompleto();

            var_dump($colecaoTarefas);
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }
}
