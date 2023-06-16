<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()) : ?>
    <?php
    $consulta = $conn->query("SELECT t.id nr_turma, c.nome curso, p.descricao periodo, t.ciclo ciclo, l.nome unidade FROM turmas t, cursos c, periodo p, locais l WHERE t.id_curso = c.id AND t.id_local = l.id AND t.id_periodo = p.id");
    $editPermission = havePermission('Turmas', 'Listar', 'r');
    $deletePermission = havePermission('Turmas', 'Excluir', 'w');

    $numberPermission = havePermission('Turmas', 'Numero Turma', 'r');
    $cursoPermission = havePermission('Turmas', 'Curso', 'r');
    $periodoPermission = havePermission('Turmas', 'Periodo', 'r');
    $cicloPermission = havePermission('Turmas', 'Ciclo', 'r');
    $localPermission = havePermission('Turmas', 'Local', 'r');
    ?>
    <?php if (havePermission('Turmas', 'Listar', 'r')) : ?>
        <table>
            <caption>
                Lista de Turmas
            </caption>
            <thead>
                <tr>
                    <th id='name'>
                        <?php if ($numberPermission) : ?>
                            Número Turma
                        <?php endif; ?>
                    </th>
                    <th id='nivel'>
                        <?php if ($cursoPermission) : ?>
                            Curso
                        <?php endif; ?>
                    </th>
                    <th id='duracao'>
                        <?php if ($periodoPermission) : ?>
                            Período
                        <?php endif; ?>
                    </th>
                    <th id='qtd_ciclos'>
                        <?php if ($cicloPermission) : ?>
                            Ciclo
                        <?php endif; ?>
                    </th>
                    <th id='status'>
                        <?php if ($localPermission) : ?>
                            Unidade
                        <?php endif; ?>
                    </th>
                    <?php if ($editPermission) : ?>
                        <th id='edit'>Editar</th>
                    <?php endif; ?>
                    <?php if ($deletePermission) : ?>
                        <th id='delete'>Excluir</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $linha) : ?>
                    <tr>
                        <td headers='name'>
                            <?php if ($numberPermission) : ?>
                                <?= $linha['nr_turma'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='nivel'>
                            <?php if ($cursoPermission) : ?>
                                <?= $linha['curso'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='duracao'>
                            <?php if ($periodoPermission) : ?>
                                <?= $linha['periodo'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='qtd_ciclos'>
                            <?php if ($cicloPermission) : ?>
                                <?= $linha['ciclo'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='status'>
                            <?php if ($localPermission) : ?>
                                <?= $linha['unidade'] ?>
                            <?php endif; ?>
                        </td>
                        <?php if ($editPermission) : ?>
                            <td headers='edit'>
                                <a href="/sistema_corno/courses/classes/classedit.php?id=<?= $linha['nr_turma'] ?>" alt='Editar' title='Editar' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png'/></a>
                            </td>
                        <?php endif; ?>
                        <?php if ($deletePermission) : ?>
                            <td headers='delete'>
                                <a href="/sistema_corno/courses/classes/classdelete.php?id=<?= $linha['nr_turma'] ?>" alt='Exluir' title='Excluir' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png'/></a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    <?php else : ?>
        <p>Forbidden.</p>
    <?php endif; ?>
<?php else : ?>
    <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>