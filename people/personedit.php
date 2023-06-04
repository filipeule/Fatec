<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

if (isset($_POST['nome'])) {
  $usuario = $conn->query("SELECT * FROM cornos WHERE nome LIKE '%{$_POST['nome']}%'")->fetch(PDO::FETCH_ASSOC);
} else {
  $usuario = $conn->query("SELECT * FROM cornos WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);
}


// $permissionLevel = getPermissionLevel('Cornos', 'Tipo Corno');

?>
<?php if (@validarSessao()): ?>
  <?php
  $usuario_tipo_corno = getCuckoldTypeById($usuario['id_tipo_corno']);
  $editPermission = havePermission('Tipos Corno', $usuario_tipo_corno, 'w');
  $readonly = setStringIfTrue('readonly', !$editPermission);

  $tipoCorno = $conn->query("SELECT * FROM tipos_corno")->fetchAll();
  ?>
  <fieldset class='cadastroForm'>
    <legend class='formulario'>Editar Corno</legend>
    <form name='form1' action='/sistema_corno/people/routines/editperson.php' method='post'>
      <div class='formulario'>
        <div class='campos'>
          <label class='labels' for='id'>ID</label>
          <input class='campo' type='number' name='id' placeholder='ID do usuário' value="<?= $usuario['id'] ?>" readonly>
        </div>
        <?php if (havePermission('Cornos', 'Nome', 'r')): ?>
          <?php $readonly = setStringIfTrue('readonly', !havePermission('Cornos', 'Nome', 'w')) ?>
          <div class='campos'>
            <label class='labels' for='nome'>Nome</label>
            <input class='campo' type='text' name='nome' placeholder='  Digite seu nome:' required maxlength='100'
              value="<?= $usuario['nome'] ?>" <?= $readonly ?>>
          </div>
        <?php endif; ?>
        <?php if (havePermission('Cornos', 'Email', 'r')): ?>
          <?php $readonly = setStringIfTrue('readonly', !havePermission('Cornos', 'Email', 'w')) ?>
          <div class='campos'>
            <label class='labels' for='email'>Email</label>
            <input class='campo' type='text' name='email' placeholder='  Digite seu email:' required maxlength='300'
              value="<?= $usuario['email'] ?>" <?= $readonly ?>>
          </div>
        <?php endif; ?>
        <?php if (havePermission('Cornos', 'CPF', 'r')): ?>
          <?php $readonly = setStringIfTrue('readonly', !havePermission('Cornos', 'CPF', 'w')) ?>
          <div class='campos'>
            <label class='labels' for='cpf'>CPF</label>
            <input class='campo' type='text' name='cpf' placeholder='  Digite seu CPF:' required maxlength='14'
              value="<?= $usuario['cpf'] ?>" <?= $readonly ?>>
          </div>
        <?php endif; ?>
        <?php if (havePermission('Cornos', 'Telefone', 'r')): ?>
          <?php $readonly = setStringIfTrue('readonly', !havePermission('Cornos', 'Telefone', 'w')) ?>
          <div class='campos'>
            <label class='labels' for='telefone'>Telefone</label>
            <input class='campo' type='tel' name='telefone' placeholder='  Digite seu telefone:' required maxlength='11'
              value="<?= $usuario['telefone'] ?>" <?= $readonly ?>>
          </div>
        <?php endif; ?>
        <?php if (havePermission('Cornos', 'Endereco', 'r')): ?>
          <?php $readonly = setStringIfTrue('readonly', !havePermission('Cornos', 'Endereco', 'w')) ?>
          <div class='campos'>
            <label class='labels' for='endereco'>Endereço</label>
            <input class='campo' type='text' name='endereco' placeholder='  Digite seu endereço:' required maxlength='100'
              value="<?= $usuario['endereco'] ?>" <?= $readonly ?>>
          </div>
        <?php endif; ?>
        <?php if (havePermission('Cornos', 'Tipo Corno', 'r')): ?>
          <div class="campos">
            <label class="labels" for="id_tipo_corno" data-placeholder="Escolha o tipo do chifrudo">Tipo Corno</label>

            <?php $disabled = setStringIfTrue('disabled', !$editPermission) ?>
            <select name="id_tipo_corno" id="id_tipo_corno" <?= $disabled ?>>
              <?php if ($editPermission): ?>
                <?php foreach ($tipoCorno as $tipo): ?>
                  <?php if (havePermission('Tipos Corno', $tipo['descricao'], 'w')): ?>
                    <option value="<?= $tipo['id'] ?>"><?= $tipo['descricao'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                <?php $usuario_tipo_corno = getCuckoldTypeById($usuario['id_tipo_corno']) ?>
                <option value="<?= $usuario['id_tipo_corno'] ?>"><?= $usuario_tipo_corno ?></option>
              <?php endif; ?>
            </select>
          </div>
        <?php endif; ?>
        <div class='listaBotoes'>
          <?php if ($editPermission): ?>
            <input class='botoes' type='submit' value='Confirmar'>
          <?php endif; ?>
          <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
        </div>
      </div>
    </form>
  </fieldset>
<?php else: ?>
  <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>