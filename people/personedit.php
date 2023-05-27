<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

if (isset($_POST['nome'])) {
   $usuario = $conn->query("SELECT * FROM cornos WHERE nome LIKE '%{$_POST['nome']}%'")->fetch(PDO::FETCH_ASSOC);
} else {
   $usuario = $conn->query("SELECT * FROM cornos WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);
}

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
         <div class='campos'>
            <label class='labels' for='nome'>Nome</label>
            <input class='campo' type='text' name='nome' placeholder='  Digite seu nome:' required maxlength='100' value="<?= $usuario['nome'] ?>">
         </div>
         <div class='campos'>
            <label class='labels' for='email'>Email</label>
            <input class='campo' type='text' name='email' placeholder='  Digite seu email:' required maxlength='300' value="<?= $usuario['email'] ?>">
         </div>
         <div class='campos'>
            <label class='labels' for='cpf'>CPF</label>
            <input class='campo' type='text' name='cpf' placeholder='  Digite seu CPF:' required maxlength='14' value="<?= $usuario['cpf'] ?>">
         </div>
         <div class='campos'>
            <label class='labels' for='telefone'>Telefone</label>
            <input class='campo' type='tel' name='telefone' placeholder='  Digite seu telefone:' required maxlength='11' value="<?= $usuario['telefone'] ?>">
         </div>
         <div class='campos'>
            <label class='labels' for='telefone'>Endereço</label>
            <input class='campo' type='text' name='endereco' placeholder='  Digite seu endereço:' required maxlength='100' value="<?= $usuario['endereco'] ?>">
         </div>
         <?php if(!isAdmin()): ?>
         <div class="campos">
               <label class="labels" for="id_tipo_corno" data-placeholder="Escolha o tipo do chifrudo">Tipo Corno</label>
               <select name="id_tipo_corno" id="seletorCadTurma" value="<?= $tipoCorno[$usuario['id_tipo_corno']] ?>">
               <?php foreach ($tipoCorno as $tipo): ?>
                  <option value="<?= $tipo['id'] ?>"><?= $tipo['descricao'] ?></option>
               <?php endforeach; ?>
               </select>
         </div>
         <?php endif; ?>
         <div class='listaBotoes'>
            <input class='botoes' type='submit' value='Confirmar'>
            <input class='botoes' type='reset' value='Cancelar'>
         </div>
      </div>
</fieldset>
</form>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>