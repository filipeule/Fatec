<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()) : ?>
    <?php
    $stmt = $conn->prepare("SELECT * FROM locais WHERE nome like ? ");
    $searchString = "%" . $_POST['nome'] . "%";
    $stmt->bindParam(1, $searchString, PDO::PARAM_STR);
    $stmt->execute();
    $editPermission = havePermission('Locais', 'Criar', 'w');
    $deletePermission = havePermission('Locais', 'Excluir', 'w');
    ?>
    <table>
        <caption>
            Resultado da Pesquisa
        </caption>
        <thead>
            <tr>
                <th id='nome'>Nome</th>
                <th id='endereco'>Email</th>
                <th id='telefone'>Telefone</th>
                <th id='responsavel'>Responsável</th>
                <?php if ($editPermission) : ?>
                    <th id='edit'>Editar</th>
                <?php endif; ?>
                <?php if ($deletePermission) : ?>
                    <th id='delete'>Excluir</th>
                <?php endif; ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $local) : ?>
                <?php
                $responsavel = $conn->query("SELECT * FROM cornos WHERE id = " . $local['id_responsavel'])->fetch();

                $editHidden = setStringIfTrue('hidden', !havePermission('Locais', 'Criar', 'w'));
                $deleteHidden = setStringIfTrue('hidden', !havePermission('Locais', 'Excluir', 'w'));

                ?>
                <tr>
                    <td headers='nome'>
                        <?php if (havePermission('Locais', 'Nome', 'rw') || havePermission('Locais', 'Nome', 'r')) : ?>
                            <?= $local['nome'] ?>
                        <?php endif; ?>
                    </td>
                    <?php if (havePermission('Locais', 'Endereco', 'rw') || havePermission('Locais', 'Endereco', 'r')) : ?>
                        <td headers='endereco'>
                            <?= $local['endereco'] ?>
                        </td>
                    <?php endif; ?>
                    <td headers='telefone'>
                        <?php if (havePermission('Locais', 'Telefone', 'rw') || havePermission('Locais', 'Telefone', 'r')) : ?>
                            <?= $local['telefone'] ?>
                        <?php endif; ?>
                    </td>
                    <td headers='responsavel'>
                        <?php if (havePermission('Locais', 'Responsavel', 'r') || havePermission('Locais', 'Responsavel', 'r')) : ?>
                            <?= $responsavel['nome'] ?>
                        <?php endif; ?>
                    </td>
                    <?php if ($editPermission) : ?>
                        <td headers='edit'>
                            <a href="/sistema_corno/locations/locationedit.php?id=<?= $local['id'] ?>" alt='Editar' title='Editar' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png' <?= $editHidden ?> /></a>
                        </td>
                    <?php endif; ?>
                    <?php if ($deletePermission) : ?>
                        <td headers='delete'>
                            <a href="/sistema_corno/locations/locationdelete.php?id=<?= $local['id'] ?>" alt='Exluir' title='Excluir' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png' <?= $deleteHidden ?> /></a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
<?php else : ?>
    <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>