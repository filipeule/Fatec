<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>
<?php if (@validarSessao()): ?>
  <?php
  $usuario = $conn->query("SELECT * FROM cornos WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);
  $tipoCorno = $conn->query("SELECT * FROM tipos_corno")->fetchAll();
  $usuario_tipo_corno = getCuckoldTypeById($usuario['id_tipo_corno']);
  $editPermission = (havePermission('Tipos Corno', $usuario_tipo_corno, 'w') and $usuario_tipo_corno != 'Administrador');
  ?>
  <?php if ($editPermission): ?>
    <fieldset class='cadastroForm'>
      <legend class='formulario'>Deletar Corno</legend>
      <h4>Quer mesmo apagar esse corno aqui?</h4>
      <form name='form1' action='/sistema_corno/people/routines/deleteperson.php' method='post'>
        <div class='formulario'>
          <div class='campos'>
            <label class='labels' for='id'>ID</label>
            <input class='campo' type='number' name='id' placeholder='ID do usuário' value="<?= $usuario['id'] ?>" readonly>
          </div>
          <div class='campos'>
            <label class='labels' for='nome'>Nome</label>
            <input class='campo' type='text' name='nome' placeholder='  Digite seu nome:' required maxlength='100'
              value="<?= $usuario['nome'] ?>" readonly>
          </div>
          <div class='campos'>
            <label class='labels' for='email'>Email</label>
            <input class='campo' type='text' name='email' placeholder='  Digite seu email:' required maxlength='300'
              value="<?= $usuario['email'] ?>" readonly>
          </div>
          <div class='campos'>
            <label class='labels' for='cpf'>CPF</label>
            <input class='campo' type='text' name='cpf' placeholder='  Digite seu CPF:' required maxlength='14'
              value="<?= $usuario['cpf'] ?>" readonly>
          </div>
          <div class='campos'>
            <label class='labels' for='telefone'>Telefone</label>
            <input class='campo' type='tel' name='telefone' placeholder='  Digite seu telefone:' required maxlength='11'
              value="<?= $usuario['telefone'] ?>" readonly>
          </div>
          <div class='campos'>
            <label class='labels' for='telefone'>Endereço</label>
            <input class='campo' type='text' name='endereco' placeholder='  Digite seu endereço:' required maxlength='100'
              value="<?= $usuario['endereco'] ?>" readonly>
          </div>
          <div class="campos">
            <label class="labels" for="id_tipo_corno" data-placeholder="Escolha o tipo do chifrudo">Tipo Corno</label>
            <select name="id_tipo_corno" id="id_tipo_corno" disabled>
              <?php $usuario_tipo_corno = getCuckoldTypeById($usuario['id_tipo_corno']) ?>
              <option value="<?= $usuario['id_tipo_corno'] ?>"><?= $usuario_tipo_corno ?></option>
            </select>
          </div>
          <div class='listaBotoes'>
            <input class='botoes' type='submit' value='Confirmar'>
            <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
          </div>
        </div>
      </form>
    </fieldset>
  <?php else: ?>
    <p>Forbidden.</p>
  <?php endif; ?>
<?php else: ?>
  <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>