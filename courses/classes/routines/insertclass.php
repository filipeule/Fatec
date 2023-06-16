<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (isset($_POST['nome']) && isset($_POST['id_nivel']) && isset($_POST['id_duracao_ciclo']) && isset($_POST['qtd_ciclos']) && isset($_POST['id_status'])) : ?>
  <?php
  $sql = "INSERT INTO cursos (nome, id_nivel, id_duracao_ciclo, qtd_ciclos, id_status) VALUES (?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(1, $_POST['nome'], PDO::PARAM_STR);
  $stmt->bindParam(2, $_POST['id_nivel'], PDO::PARAM_STR);
  $stmt->bindParam(3, $_POST['id_duracao_ciclo'], PDO::PARAM_STR);
  $stmt->bindParam(4, $_POST['qtd_ciclos'], PDO::PARAM_STR);
  $stmt->bindParam(5, $_POST['id_status'], PDO::PARAM_STR);
  $success = $stmt->execute();

  ?>
  <?php if ($success) : ?>
    <p>Salvo com sucesso. Clique <a class="linkVoltar" href="/sistema_corno/courses/info/coursecreate.php">aqui</a> para voltar.</p>
  <?php else : ?>
    <p>Erro ao criar curso: <?= $stmt->error ?></p>
  <?php endif; ?>

<?php else : ?>
  <p>400 - Bad Request. Clique <a class="linkVoltar" href="/sistema_corno/courses/info/coursecreate.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>