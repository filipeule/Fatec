<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<?php if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['id_tipo_corno'])): ?>
   <?php
   $varNome = $_POST['nome'];
   $varEmail = $_POST['email'];
   $varSenha = $_POST['senha'];
   $varCpf = $_POST['cpf'];
   $varTelefone = $_POST['telefone'];
   $varEndereco = $_POST['endereco'];
   $varIdTipoCorno = $_POST['id_tipo_corno'];

   require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

   $sql = "INSERT INTO cornos (nome, email, senha, cpf, telefone, endereco, id_tipo_corno) VALUES ('$varNome','$varEmail','$varSenha','$varCpf','$varTelefone', '$varEndereco', '$varIdTipoCorno')";

   $conn->exec($sql);
   ?>

   <p>Salvo com sucesso. Clique <a class="linkVoltar" href="/sistema_corno/people/personcreate.php">aqui</a> para voltar.</p>
<?php else: ?>
   <p>400 - Bad Request. Clique <a class="linkVoltar" href="/sistema_corno/people/personcreate.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>