<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    private $entityManager;
    /**
     */
    function __construct()
    {

        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }
    /**
     */
    function processoRequisicao(): void
    {
        $curso = new Curso();
        $curso->setDescricao(strip_tags($_POST['descricao']));
        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        header('Location: /listar-cursos', true, 302);
    }
}
