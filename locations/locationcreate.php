<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<?php if (@validarSessao()) : ?>
   <?php
      $diretores = $conn->query('SELECT * FROM cornos WHERE id_tipo_corno = (SELECT tipos_corno.id FROM tipos_corno WHERE descricao = "Diretor")')->fetchAll();  
   ?>
   
   <?php if (havePermission('Locais', 'Criar', 'w')) : ?>
      <fieldset class="cadastroForm">
         <legend class="formulario">Cadastro de Unidades Chifrudas</legend>
         <form name="form1" action="/sistema_corno/locations/routines/insertlocation.php" method="post">
            <div class="formulario">
               <div class="campos">
                  <label class="labels" for="nome">Nome</label>
                  <input class="campo" type="text" name="nome" placeholder="  Digite o nome da unidade:" required maxlength="200">
               </div>
               <div class="campos">
                  <label class="labels" for="endereco">Endereço</label>
                  <input class="campo" type="text" name="endereco" placeholder="  Digite o endereço:" required>
               </div>
               <div class="campos">
                  <label class="labels" for="telefone">Telefone</label>
                  <input class="campo" type="text" name="telefone" placeholder="  Digite o telefone:" required maxlength="11">
               </div>
               <div class="campos">
                  <label class="labels" for="responsavel" data-placeholder="Escolha o chifrudo que vai gerenciar essa bagaça">Responsável</label>
                  <select name="responsavel" id="responsavel">
                     <?php foreach($diretores as $diretor): ?>
                        <option value="<?= $diretor['id'] ?>"><?= $diretor['nome']?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="listaBotoes">
                  <input class="botoes" type="submit" value="Enviar">
                  <input class="botoes" type="reset" value="Cancelar">
               </div>
            </div>
      </fieldset>
      </form>
   <?php else : ?>
      <p>Forbidden</p>
   <?php endif; ?>
<?php else : ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>