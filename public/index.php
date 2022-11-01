<?php

require __DIR__ . '/../vendor/autoload.php';


use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

switch ($_SERVER['PATH_INFO']) {
    case '/listar-cursos':
        $controlador = new ListarCursos();
        $controlador->processoRequisicao();
        break;
    case '/novo-curso':
        $controlador = new FormularioInsercao();
        $controlador->processoRequisicao();
        break;
    case '/salvar-curso':
        $controlador = new Persistencia();
        $controlador->processoRequisicao();
        break;
    default:
        echo "Error 404";
        break;
}
