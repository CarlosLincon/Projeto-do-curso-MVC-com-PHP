<?php include __DIR__ . '/../inicio-html.php'; ?>
<a href="/novo-curso" class="btn btn-primary mb-2">Novo Curso</a>
<ul class="list-group">
    <?php foreach ($cursos as $curso) : ?>
        <li class="list-group-item d-flex justify-content-between">
            <?php
            /* Motivo de usar o strip_tags aqui também. Caso 
               haja uma entrada de dados html fora do do arquivo 
               Persistencia.php, aqui também assegura 
               que não irar pro front-end da página.
             */
            $cursoAtual = $curso->getDescricao();
            echo strip_tags($cursoAtual);
            ?>
            <a href="/excluir-curso" class="btn btn-danger btn-sm">
                Excluir
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php include __DIR__ . '/../fim-html.php'; ?>