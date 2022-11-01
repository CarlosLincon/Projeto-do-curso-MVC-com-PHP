<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao implements InterfaceControladorRequisicao
{


    public function processoRequisicao(): void
    {
        $titulo = 'Adicionar novo curso';
        require __DIR__ . '/../../view/cursos/formulario.php';
    }
}
