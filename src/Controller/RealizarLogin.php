<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin implements InterfaceControladorRequisicao
{

    private $repositorioDeUsuarios;
    function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    function processoRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (is_null($email) || $email === false) {
            echo "E-mail inválido";
            exit();
        }
        $senha = strip_tags($_POST['senha']);

         /** @var  $usuario */
        $usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            echo "E-mail ou senha inválido";
            return;
        }

        
        $_SESSION['logado'] = true;
        
        header('Location: /listar-cursos');
    }

    /**
     */
}
