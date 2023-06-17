<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (isset($_POST['id'])) : ?>
   <?php

   $sql = "DELETE FROM locais WHERE id = ?";

   $stmt = $conn->prepare($sql);
   $stmt->bindParam(1, $_POST['id'], PDO::PARAM_INT);
   $stmt->execute();

   ?>
   <?php if ($stmt->execute() === TRUE): ?>
      <p>Registro deletado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/locations/locationslist.php">aqui</a> para voltar.</p>
   <?php else: ?>
      <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
   <?php endif; ?>
<?php else: ?>
   <p>Algo de errado não está certo. Clique <a class="linkVoltar" href="/sistema_corno/locations/locationslist.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>