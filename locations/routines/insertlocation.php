<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<?php if (isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['telefone']) && isset($_POST['responsavel'])): ?>
   <?php
   $varNome = $_POST['nome'];
   $varEndereco = $_POST['endereco'];
   $varTelefone = $_POST['telefone'];
   $varResponsavel = $_POST['responsavel'];

   require_once('.env.php');

   $sql = "insert into tblocais (nome,endereco,telefone,responsavel) values ('$varNome','$varEndereco','$varTelefone','$varResponsavel')";

   $conn->exec($sql);
   ?>

   <p>Salvo com sucesso.</p>
   <p>Clique <a href="cadlocal.php">aqui</a> para voltar.</p>

<?php else: ?>
   <p>400 - Bad Request <br> Clique <a href="cadlocal.php">aqui</a> para voltar.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>