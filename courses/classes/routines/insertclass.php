<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (isset($_POST['id_periodo']) && isset($_POST['id_curso']) && isset($_POST['nr_ciclo']) && isset($_POST['id_local'])): ?>
   <?php
   $sql = "INSERT INTO turmas (id_periodo, ciclo, id_curso, id_local) VALUES (?, ?, ?, ?)";

   $stmt = $conn->prepare($sql);
   $stmt->bindParam(1, $_POST['id_periodo'], PDO::PARAM_STR);
   $stmt->bindParam(2, $_POST['id_curso'], PDO::PARAM_STR);
   $stmt->bindParam(3, $_POST['nr_ciclo'], PDO::PARAM_STR);
   $stmt->bindParam(4, $_POST['id_local'], PDO::PARAM_STR);
   $success = $stmt->execute();

   ?>
   <?php if ($success): ?>
      <p>Salvo com sucesso. Clique <a class="linkVoltar" href="/sistema_corno/courses/classes/classcreate.php">aqui</a> para
         voltar.</p>
   <?php else: ?>
      <p>Erro ao criar curso:
         <?= $stmt->error ?>
      </p>
   <?php endif; ?>

<?php else: ?>
   <p>400 - Bad Request. Clique <a class="linkVoltar" href="/sistema_corno/courses/classes/coursecreate.php">aqui</a> para
      voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>