<?php

namespace Alura\Cursos\Controller;

class FormularioLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{

    /**
     */
    function processoRequisicao(): void
    {
       echo $this->rederizaHtml('login/formulario.php', [
            'titulo' => 'Acesse a sua conta']);
    }
}
