<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<?php if (@validarSessao()): ?>
   <fieldset class="cadastroForm">
      <legend class="formulario">Cadastro de Turmas</legend>
      <form name="form1" action="inserirturma.php" method="post">
         <div class="formulario">
            <div class="campos">
               <label class="labels" for="nome">Nome</label>
               <input class="campo" type="text" name="nome" placeholder="  Digite o nome do curso:" required
                  maxlength="200">
            </div>
            <div class="campos">
               <label class="labels" for="nivel">Nivel</label>
               <input class="campo" type="number" name="nivel" placeholder="  Digite o nivel:" required maxlength="11">
            </div>
            <div class="campos">
               <label class="labels" for="faixaetariaminima">Faixa Etária Mínima</label>
               <input class="campo" type="number" name="faixaetariaminima" placeholder="  Digite a faixa etária mínima:"
                  required maxlength="11">
            </div>
            <div class="campos">
               <label class="labels" for="faixaetariamaxima">Faixa Etária Máxima</label>
               <input class="campo" type="number" name="faixaetariamaxima" placeholder="  Digite a faixa etária máxima:"
                  required maxlength="11">
            </div>
            <div class="campos">
               <label class="labels" for="status">Status</label>
               <select name="status" id="seletorCadTurma">
                  <?php

                  require_once("/common/dbconnection.php");

                  $consulta = $conn->query("SELECT * FROM tbstatus order by descricao");

                  ?>
                  <?php while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                     <option value="<?= $linha['id'] ?>"><?= $linha['descricao'] ?></option>"
                  <?php endwhile; ?>
               </select>
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