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
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $curso = $this->entityManager->find(Curso::class, $id);
            $curso->setDescricao(strip_tags($_POST['descricao']));
        } else {
            //inseri
            $this->entityManager->persist($curso);
        }
        $this->entityManager->flush();
        header('Location: /listar-cursos', true, 302);
    }
}
