<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");
session_destroy();
session_start();

try {
   ?>
   <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
      <!-- verificar se o formulário foi preenchido -->
      <?php if (isset($_POST['email']) && isset($_POST['senha'])): ?>
         <!-- capturar os valores dos campos do formulário e colocar nas variáveis -->
         <?php

         $varEmail = testarEntrada($_POST['email']);
         $varSenha = testarEntrada($_POST['senha']);
         
         $sql = "SELECT * FROM cornos WHERE email = ? AND senha = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(1, $varEmail, PDO::PARAM_STR);
         $stmt->bindParam(2, $varSenha, PDO::PARAM_STR);
         $stmt->execute();

         ?>

         <?php if ($stmt->rowCount() == 1): ?>
            <p>Login ok</p>

            <?php
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nomeUsuario'] = $linha['nome'];
            $_SESSION['idUsuario'] = $linha['id'];
            header("location:/sistema_corno/people/peoplelist.php");
         ?>
         <?php else: ?>
            <?php session_unset(); ?>

            <p>Login inválido</p>
         <?php endif; ?>

         <!-- fim do if -->
      <?php else: ?>
         <p>Você deve preencher todos os campos do formulário, clique <a href='login.php'>aqui</a> para voltar.</p>
      <?php endif; ?>
      <!-- fim do if server post -->
   <?php else: ?>
      <p>Problemas ao realizar o envio dos dados do formulário, clique <a href='login.php'>aqui</a> para voltar.</p>
   <?php endif; ?>

   <?php
} catch (Exception $e) {
?>
   <p class="erro">Ocorreu um erro: <?= $e->getMessage() ?></p>

<?php
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>