<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<?php if (isset($_POST['descricao'])): ?>
   <?php
   $varDescricao = $_POST['descricao'];

   require_once('.env.php');

   $sql = "insert into tbstatus (descricao) values ('$varDescricao')";

   $conn->exec($sql);
   ?>

   <p>Salvo com sucesso. Clique <a href="cadstatus.php">aqui</a> para voltar.</p>

<?php else: ?>
   <p>400 - Bad Request <br> Clique <a href="cadstatus.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>