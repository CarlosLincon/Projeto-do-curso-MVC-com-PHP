<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerComHtml implements InterfaceControladorRequisicao
{


    public function processoRequisicao(): void
    {
        echo  $this->rederizaHtml('cursos/formulario.php', [
            'titulo' => 'Adicionar novo curso'
        ]);
    }
}
