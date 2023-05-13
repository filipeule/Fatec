<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>
<?php if (@validarSessao()): ?>
   <fieldset class="cadastroForm">
      <legend class="formulario">Cadastro de Status</legend>
      <form name="form1" action="inserirstatus.php" method="post">
         <div class="formulario">
            <div class="campos">
               <label class="labels" for="descricao">Descrição</label>
               <input class="campo" type="text" name="descricao" placeholder="  Digite a descrição:" required maxlength="100">
            </div>
            <div class="listaBotoes">
               <input class="botoes" type="submit" value="Enviar">
               <input class="botoes" type="reset" value="Cancelar">
            </div>
         </div>
      </form>
   </fieldset>
<?php else: ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>