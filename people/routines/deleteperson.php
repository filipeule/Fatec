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

   $sql = "DELETE FROM cornos WHERE id = ?";

   $stmt = $conn->prepare($sql);
   $stmt->bindParam(1, $varUsuarioId, PDO::PARAM_INT);
   $stmt->execute();

   ?>
   <?php if ($stmt->execute() === TRUE): ?>
      <p>Registro deletado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/people/peoplelist.php">aqui</a> para voltar.</p>
   <?php else: ?>
      <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
   <?php endif; ?>
<?php else: ?>
   <p>Algo de errado não está certo. Clique <a class="linkVoltar" href="/sistema_corno/people/peoplelist.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>