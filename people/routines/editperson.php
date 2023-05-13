<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['id_tipo_corno'])): ?>
   <?php
   $varUsuarioId = $_POST['id'];
   $varNome = $_POST['nome'];
   $varEmail = $_POST['email'];
   $varCpf = $_POST['cpf'];
   $varTelefone = $_POST['telefone'];
   $varEndereco = $_POST['endereco'];
   $varIdTipoCorno = $_POST['id_tipo_corno'];

   $sql = "UPDATE cornos SET nome = ?, email = ?, cpf = ?, telefone = ?, endereco = ?, id_tipo_corno = ? WHERE id = ?";

   $stmt = $conn->prepare($sql);
   $stmt->bindParam(1, $varNome, PDO::PARAM_STR);
   $stmt->bindParam(2, $varEmail, PDO::PARAM_STR);
   $stmt->bindParam(3, $varCpf, PDO::PARAM_STR);
   $stmt->bindParam(4, $varTelefone, PDO::PARAM_STR);
   $stmt->bindParam(5, $varEndereco, PDO::PARAM_STR);
   $stmt->bindParam(6, $varIdTipoCorno, PDO::PARAM_INT);
   $stmt->bindParam(7, $varUsuarioId, PDO::PARAM_INT);
   $stmt->execute();

   ?>
   <?php if ($stmt->execute() === TRUE): ?>
      <p>Registro atualizado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/people/peoplelist.php">aqui</a> para voltar.</p>
   <?php else: ?>
      <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
   <?php endif; ?>
<?php else: ?>
   <p>Algo de errado não está certo. Clique <a class="linkVoltar" href="/sistema_corno/people/peoplelist.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>