<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>
<?php
$local = $conn->query("SELECT * FROM locais WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);

$diretor = $conn->query("SELECT * FROM cornos WHERE id_tipo_corno = {$local['id_responsavel']}")->fetch(PDO::FETCH_ASSOC);
?>
<?php if (@validarSessao()) : ?>
    <?php if (havePermission('Locais', 'Excluir', 'w')) : ?>
        <fieldset class='cadastroForm'>
            <legend class='formulario'>Deletar Unidade</legend>
            <h4>Tem certeza que quer apagar essa unidade?</h4>
            <form name='form1' action='/sistema_corno/locations/routines/deletelocation.php' method='post'>
                <div class='formulario'>
                    <div class='campos'>
                        <label class='labels' for='id'>ID</label>
                        <input class='campo' type='number' name='id' placeholder='ID do usuário' value="<?= $local['id'] ?>" readonly>
                    </div>
                    <div class='campos'>
                        <label class='labels' for='nome'>Nome</label>
                        <input class='campo' type='text' name='nome' placeholder='  Digite o nome da unidade:' required maxlength='200' value="<?= $local['nome'] ?>" readonly>
                    </div>
                    <div class='campos'>
                        <label class='labels' for='endereco'>Endereço</label>
                        <input class='campo' type='text' name='endereco' placeholder='  Digite o endereço:' required value="<?= $local['endereco'] ?>" readonly>
                    </div>
                    <div class='campos'>
                        <label class='labels' for='telefone'>Telefone</label>
                        <input class='campo' type='text' name='telefone' placeholder='  Digite o endereço:' required maxlength='11' value="<?= $local['telefone'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="responsavel" data-placeholder="Escolha o chifrudo que vai gerenciar essa bagaça">Responsável</label>
                        <select name="id_responsavel" id="id_responsavel" disabled>
                            <option value="<?= $diretor['id'] ?>"><?= $diretor['nome'] ?></option>
                        </select>
                    </div>
                    <div class='listaBotoes'>
                        <input class='botoes' type='submit' value='Confirmar'>
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