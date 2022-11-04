<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repositorioCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $entityManager->getRepository(Curso::class);
    }

    /**
     */
    function processoRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
            return;
        }


        echo $this->rederizaHtml('cursos/formulario.php', [
            'curso' => $this->repositorioCursos->find($id),
            'titulo' => 'Alterar curso'
        ]);
    }
}
