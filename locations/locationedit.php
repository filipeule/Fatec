<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>
<?php
if (isset($_POST['nome'])) {
    $local = $conn->query("SELECT * FROM locais WHERE nome LIKE '%{$_POST['nome']}%'")->fetch(PDO::FETCH_ASSOC);
} else {
    $local = $conn->query("SELECT * FROM locais WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);
}

$diretores = $conn->query('SELECT * FROM cornos WHERE id_tipo_corno = (SELECT tipos_corno.id FROM tipos_corno WHERE descricao = "Diretor")')->fetchAll();
?>
<?php if (@validarSessao()) : ?>
    <?php if (havePermission('Locais', 'Listar', 'rw')) : ?>
        <fieldset class='cadastroForm'>
            <legend class='formulario'>Editar Corno</legend>
            <form name='form1' action='/sistema_corno/locations/routines/editlocation.php' method='post'>
                <div class='formulario'>
                    <div class='campos'>
                        <label class='labels' for='id' hidden>ID</label>
                        <input class='campo' type='number' name='id' placeholder='ID do usuário' value="<?= $local['id'] ?>" readonly hidden>
                    </div>
                    <?php if (havePermission('Locais', 'Nome', 'r')) : ?>
                        <?php $readonly = setStringIfTrue('readonly', !havePermission('Locais', 'Nome', 'w')) ?>
                        <div class='campos'>
                            <label class='labels' for='nome'>Nome</label>
                            <input class='campo' type='text' name='nome' placeholder='  Digite o nome da unidade:' required maxlength='200' value="<?= $local['nome'] ?>" <?= $readonly ?>>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Locais', 'Endereco', 'r')) : ?>
                        <?php $readonly = setStringIfTrue('readonly', !havePermission('Locais', 'Endereco', 'w')) ?>
                        <div class='campos'>
                            <label class='labels' for='endereco'>Endereço</label>
                            <input class='campo' type='text' name='endereco' placeholder='  Digite o endereço:' required value="<?= $local['endereco'] ?>" <?= $readonly ?>>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Locais', 'Telefone', 'r')) : ?>
                        <?php $readonly = setStringIfTrue('readonly', !havePermission('Locais', 'Telefone', 'w')) ?>
                        <div class='campos'>
                            <label class='labels' for='telefone'>Telefone</label>
                            <input class='campo' type='text' name='telefone' placeholder='  Digite o endereço:' required maxlength='11' value="<?= $local['telefone'] ?>" <?= $readonly ?>>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Locais', 'Responsavel', 'r')) : ?>
                        <div class="campos">
                            <label class="labels" for="responsavel" data-placeholder="Escolha o chifrudo que vai gerenciar essa bagaça">Responsável</label>
                            <?php $disabled = setStringIfTrue('disabled', !havePermission('Locais', 'Responsavel', 'w')) ?>
                            <select name="id_responsavel" id="id_responsavel" <?= $disabled ?>>
                                <?php foreach ($diretores as $diretor) : ?>
                                    <option value="<?= $diretor['id'] ?>"><?= $diretor['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class='listaBotoes'>
                        <?php if (havePermission('Locais', 'Listar', 'w')) : ?>
                            <input class='botoes' type='submit' value='Confirmar'>
                        <?php endif; ?>
                        <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
                    </div>
                </div>
            </form>
        </fieldset>
    <?php else : ?>
        <p>Forbidden.</p>
    <?php endif; ?>
<?php else : ?>
    <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>