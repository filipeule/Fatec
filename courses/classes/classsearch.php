<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (@validarSessao()): ?>
   <?php
   $consulta = $conn->query("SELECT * FROM tipos_corno")->fetchAll();
   ?>
   <fieldset class="cadastroForm">
      <legend class="formulario">Pesquisar Turmas</legend>
      <form name="form1" action="/sistema_corno/courses/classes/classsearchresults.php" method="post">
         <div class="formulario">
            <div class="campos">
               <label class="labels" for="nome">Número</label>
               <input class="campo" type="number" name="id" placeholder="Pesquise uma turma pelo seu número:" required maxlength="100">
            </div>
            <div class="listaBotoes">
               <input class="botoes" type="submit" value="Enviar">
               <input class="botoes" type="reset" value="Cancelar">
            </div>
         </div>
   </fieldset>
   </form>


<?php else: ?>
   <p>Conecte-se para visualizar esta página.</p>";
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>