<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

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


   $sql = "INSERT INTO cornos (nome, email, senha, cpf, telefone, endereco, id_tipo_corno) VALUES (?, ?, ?, ?, ?, ?, ?)";
   
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(1, $_POST['nome'], PDO::PARAM_STR);
   $stmt->bindParam(2, $_POST['email'], PDO::PARAM_STR);
   $stmt->bindParam(3, $_POST['cpf'], PDO::PARAM_STR);
   $stmt->bindParam(4, $_POST['telefone'], PDO::PARAM_STR);
   $stmt->bindParam(5, $_POST['endereco'], PDO::PARAM_STR);
   $stmt->bindParam(6, $_POST['id_tipo_corno'], PDO::PARAM_INT);
   $stmt->bindParam(7, $_POST['id'], PDO::PARAM_INT);
   $success = $stmt->execute();

   ?>
  <?php if ($success): ?>
    <p>Salvo com sucesso. Clique <a class="linkVoltar" href="/sistema_corno/people/personcreate.php">aqui</a> para voltar.</p>
  <?php else: ?>
    <p>Erro ao criar corno: <?= $stmt->error ?></p>
  <?php endif; ?>

<?php else: ?>
   <p>400 - Bad Request. Clique <a class="linkVoltar" href="/sistema_corno/people/personcreate.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>