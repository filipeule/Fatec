<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()) : ?>
    <?php
    $consulta = $conn->query("SELECT c.id, c.nome curso, n.descricao nivel, d.descricao ciclo, c.qtd_ciclos qtdCiclos, s.descricao 'status' FROM cursos c, nivel n, duracao_ciclo d, curso_status s WHERE c.id_nivel = n.id and c.id_duracao_ciclo = d.id and c.id_status = s.id");
    $editPermission = havePermission('Cursos', 'Listar', 'w');
    $deletePermission = havePermission('Cursos', 'Excluir', 'w');

    $namePermission = havePermission('Cursos', 'Nome', 'r');
    $nivelPermission = havePermission('Cursos', 'Nivel', 'r');
    $duracaoPermission = havePermission('Cursos', 'Duracao', 'r');
    $qtdCiclosPermission = havePermission('Cursos', 'Quantidade Ciclos', 'r');
    $statusPermission = havePermission('Cursos', 'Status', 'r');
    ?>
    <?php if (havePermission('Cursos', 'Listar', 'r')) : ?>
        <table>
            <caption>
                Lista de Cursos
            </caption>
            <thead>
                <tr>
                    <th id='name'>
                        <?php if ($namePermission) : ?>
                            Curso
                        <?php endif; ?>
                    </th>
                    <th id='nivel'>
                        <?php if ($nivelPermission) : ?>
                            Nível
                        <?php endif; ?>
                    </th>
                    <th id='duracao'>
                        <?php if ($duracaoPermission) : ?>
                            Ciclo
                        <?php endif; ?>
                    </th>
                    <th id='qtd_ciclos'>
                        <?php if ($qtdCiclosPermission) : ?>
                            Qtd Ciclos
                        <?php endif; ?>
                    </th>
                    <th id='status'>
                        <?php if ($statusPermission) : ?>
                            Status
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
                            <?php if ($namePermission) : ?>
                                <?= $linha['curso'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='nivel'>
                            <?php if ($nivelPermission) : ?>
                                <?= $linha['nivel'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='duracao'>
                            <?php if ($duracaoPermission) : ?>
                                <?= $linha['ciclo'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='qtd_ciclos'>
                            <?php if ($qtdCiclosPermission) : ?>
                                <?= $linha['qtdCiclos'] ?>
                            <?php endif; ?>
                        </td>
                        <td headers='status'>
                            <?php if ($statusPermission) : ?>
                                <?= $linha['status'] ?>
                            <?php endif; ?>
                        </td>
                        <?php if ($editPermission) : ?>
                            <td headers='edit'>
                                <a href="/sistema_corno/courses/info/courseedit.php?id=<?= $linha['id'] ?>" alt='Editar' title='Editar' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png' /></a>
                            </td>
                        <?php endif; ?>
                        <?php if ($deletePermission) : ?>
                            <td headers='delete'>
                                <a href="/sistema_corno/courses/info/coursedelete.php?id=<?= $linha['id'] ?>" alt='Exluir' title='Excluir' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png' /></a>
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