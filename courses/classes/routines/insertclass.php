<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

try {
   ?>
   <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
      <?php if (isset($_POST['nome']) && isset($_POST['nivel']) && isset($_POST['faixaetariaminima']) && isset($_POST['faixaetariamaxima']) && isset($_POST['status'])): ?>
         <?php
         $varNome = $_POST['nome'];
         $varNivel = $_POST['nivel'];
         $varFaixaEtariaMinima = $_POST['faixaetariaminima'];
         $varFaixaEtariaMaxima = $_POST['faixaetariamaxima'];
         $varStatus = $_POST['status'];

         require_once('.env.php');

         $sql = "insert into tbcursos (nome,nivel,faixaetariaminima,faixaetariamaxima,status) values (:nome, :nivel, :faixaetariaminima, :faixaetariamaxima, :status)";
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':nome', $varNome);
         $stmt->bindParam(':nivel', $varNivel);
         $stmt->bindParam(':faixaetariaminima', $varFaixaEtariaMinima);
         $stmt->bindParam(':faixaetariamaxima', $varFaixaEtariaMaxima);
         $stmt->bindParam(':status', $varStatus);
         $stmt->execute();
         ?>

         <p>Salvo com sucesso.</p>
         <p>Clique <a href="cadturma.php">aqui</a> para voltar.</p>
      <?php else: ?>
         <p>400 - Bad Request <br> Clique <a href="cadturma.php">aqui</a> para voltar.</p>
      <?php endif; ?>
   <?php endif; ?>

   <?php
} catch (PDOException $e) {
   ?>
   <p>Hacker FDP</p>
   <p>
      <?= $e->getMessage() ?>
   </p>
   <?php
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>