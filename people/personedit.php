<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

if (isset($_POST['nome'])) {
  $usuario = $conn->query("SELECT * FROM cornos WHERE nome LIKE '%{$_POST['nome']}%'")->fetch(PDO::FETCH_ASSOC);
} else {
  $usuario = $conn->query("SELECT * FROM cornos WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);
}

$readonly = 'readonly';
$usuario_tipo_corno = getCuckoldTypeById($usuario['id_tipo_corno']);
$editPermission = havePermission('Tipos Corno', $usuario_tipo_corno, 'w');

if ($editPermission) {
  $readonly = '';
}

$tipoCorno = $conn->query("SELECT * FROM tipos_corno")->fetchAll();

// $permissionLevel = getPermissionLevel('Cornos', 'Tipo Corno');

?>

<fieldset class='cadastroForm'>
   <legend class='formulario'>Editar Corno</legend>
   <form name='form1' action='/sistema_corno/people/routines/editperson.php' method='post'>
    <div class='formulario'>
      <div class='campos'>
        <label class='labels' for='id'>ID</label>
        <input class='campo' type='number' name='id' placeholder='ID do usuário' value="<?= $usuario['id'] ?>" readonly>
      </div>
      <div class='campos'>
        <label class='labels' for='nome'>Nome</label>
        <input class='campo' type='text' name='nome' placeholder='  Digite seu nome:' required maxlength='100' value="<?= $usuario['nome'] ?>" <?= $readonly ?>>
      </div>
      <div class='campos'>
        <label class='labels' for='email'>Email</label>
        <input class='campo' type='text' name='email' placeholder='  Digite seu email:' required maxlength='300' value="<?= $usuario['email'] ?>"<?= $readonly ?>>
      </div>
      <div class='campos'>
        <label class='labels' for='cpf'>CPF</label>
        <input class='campo' type='text' name='cpf' placeholder='  Digite seu CPF:' required maxlength='14' value="<?= $usuario['cpf'] ?>"<?= $readonly ?>>
      </div>
      <div class='campos'>
        <label class='labels' for='telefone'>Telefone</label>
        <input class='campo' type='tel' name='telefone' placeholder='  Digite seu telefone:' required maxlength='11' value="<?= $usuario['telefone'] ?>"<?= $readonly ?>>
      </div>
      <div class='campos'>
        <label class='labels' for='endereco'>Endereço</label>
        <input class='campo' type='text' name='endereco' placeholder='  Digite seu endereço:' required maxlength='100' value="<?= $usuario['endereco'] ?>"<?= $readonly ?>>
      </div>
      <?php if (havePermission('Cornos', 'Tipo Corno', 'r')): ?>
        <div class="campos">
          <label class="labels" for="id_tipo_corno" data-placeholder="Escolha o tipo do chifrudo">Tipo Corno</label>

          <?php 
          $disabled = checkFieldDisabled('Cornos', 'Tipo Corno');
          if (!$editPermission) {
            $disabled = 'disabled';
          }
          ?>
          <select name="id_tipo_corno" id="id_tipo_corno"<?= $disabled ?>>
            <?php foreach ($tipoCorno as $tipo): ?>
              <?php $selected = checkSelected($tipo['id'], $usuario['id_tipo_corno']); ?>
                <option value="<?= $tipo['id'] ?>" <?= $selected ?>><?= $tipo['descricao'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php endif; ?>
      <div class='listaBotoes'>
        <?php if ($editPermission): ?>
          <input class='botoes' type='submit' value='Confirmar'>
        <?php endif;?>
        <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
      </div>
    </div>
  </form>
</fieldset>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>