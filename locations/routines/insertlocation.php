<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['telefone']) && isset($_POST['responsavel'])) : ?>
  <?php
  $sql = "INSERT INTO locais (nome, endereco, telefone, id_responsavel) VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $_POST['nome'], PDO::PARAM_STR);
  $stmt->bindParam(2, $_POST['endereco'], PDO::PARAM_STR);
  $stmt->bindParam(3, $_POST['telefone'], PDO::PARAM_STR);
  $stmt->bindParam(4, $_POST['responsavel'], PDO::PARAM_INT);
  $success = $stmt->execute();

  ?>
  <?php if ($success) : ?>
    <p>Salvo com sucesso. Clique <a class="linkVoltar" href="/sistema_corno/locations/locationslist.php">aqui</a> para voltar.</p>
  <?php else : ?>
    <p>Erro ao criar local: <?= $stmt->error ?></p>
  <?php endif; ?>

<?php else : ?>
  <p>400 - Bad Request. Clique <a class="linkVoltar" href="/sistema_corno/locations/locationcreate.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>