<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<?php if (@validarSessao()): ?>
   <fieldset class="cadastroForm">
      <legend class="formulario">Cadastro de Unidades Chifrudas</legend>
      <form name="form1" action="inserirlocal.php" method="post">
         <div class="formulario">
            <div class="campos">
               <label class="labels" for="nome">Nome</label>
               <input class="campo" type="text" name="nome" placeholder="  Digite a unidade:" required maxlength="200">
            </div>
            <div class="campos">
               <label class="labels" for="endereco">Endereço</label>
               <input class="campo" type="text" name="endereco" placeholder="  Digite o endereço:" required>
            </div>
            <div class="campos">
               <label class="labels" for="telefone">Telefone</label>
               <input class="campo" type="text" name="telefone" placeholder="  Digite o telefone:" required maxlength="20">
            </div>
            <div class="campos">
               <label class="labels" for="responsavel">Responsável</label>
               <input class="campo" type="text" name="responsavel" placeholder="  Digite o chifrudo responsável:" required
                  maxlength="100">
            </div>
            <div class="listaBotoes">
               <input class="botoes" type="submit" value="Enviar">
               <input class="botoes" type="reset" value="Cancelar">
            </div>
         </div>
   </fieldset>
   </form>

<?php else: ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>