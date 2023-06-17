<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()) : ?>
    <?php
    $locais = $conn->query("SELECT * FROM locais");
    $editPermission = havePermission('Locais', 'Listar', 'rw');
    $deletePermission = havePermission('Locais', 'Excluir', 'w');
    ?>
    <?php if (havePermission('Locais', 'Listar', 'r')) : ?>
        <table>
            <caption>
                Lista de Unidades
            </caption>
            <thead>
                <tr>
                    <th id='nome'>Nome</th>
                    <th id='endereco'>Endereço</th>
                    <th id='telefone'>Telefone</th>
                    <th id='id_responsavel'>Responsável</th>
                    <?php if ($editPermission) : ?>
                        <th id='edit'>Editar</th>
                    <?php endif; ?>
                    <?php if ($deletePermission) : ?>
                        <th id='delete'>Excluir</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($locais->fetchAll(PDO::FETCH_ASSOC) as $local) : ?>
                    <?php
                    $responsavel = $conn->query("SELECT * FROM cornos WHERE id = " . $local['id_responsavel'])->fetch();
                    ?>
                    <tr>
                        <td headers='nome'>
                            <?= $local['nome'] ?>
                        </td>
                        <td headers='endereco'>
                            <?= $local['endereco'] ?>
                        </td>
                        <td headers='telefone'>
                            <?= $local['telefone'] ?>
                        </td>
                        <td headers='id_responsavel'>
                            <?= $responsavel['nome'] ?>
                        </td>
                        <?php if ($editPermission) : ?>
                            <td headers='edit'>
                                <a href="/sistema_corno/locations/locationedit.php?id=<?= $local['id'] ?>" alt='Editar' title='Editar' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png' /></a>
                            </td>
                        <?php endif; ?>
                        <?php if ($deletePermission) : ?>
                            <td headers='delete'>
                                <a href="/sistema_corno/locations/locationdelete.php?id=<?= $local['id'] ?>" alt='Exluir' title='Excluir' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png' /></a>
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