<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (@validarSessao()): ?>
   <?php
   $periodos = $conn->query("SELECT * FROM periodo")->fetchAll();
   $cursos = $conn->query("SELECT id, nome FROM cursos")->fetchAll();
   $locais = $conn->query("SELECT id, nome FROM locais")->fetchAll();
   ?>
   <?php if (havePermission('Turmas', 'Criar', 'w')): ?>
      <fieldset class="cadastroForm">
         <legend>Cadastro de Turmas</legend>
         <form name="form1" action="/sistema_corno/courses/classes/routines/insertclass.php" method="post">
            <div class="formulario">
               <div class="campos">
                  <label class="labels" for="id_periodo" data-placeholder="Escolha o período da turma">Período</label>
                  <select class="campo" name="id_periodo" id="id_periodo">
                     <?php foreach ($periodos as $periodo): ?>
                        <option value="<?= $periodo['id'] ?>"><?= $periodo['descricao'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="campos">
                  <label class="labels" for="id_curso" data-placeholder="Escolha o curso">Curso</label>
                  <select class="campo" name="id_curso" id="id_curso">
                     <?php foreach ($cursos as $curso): ?>
                        <option value="<?= $curso['id'] ?>"><?= $curso['nome'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="campos">
                  <label class="labels" for="nr_ciclo" data-placeholder="Escolha o ciclo da turma">Número
                     Ciclo</label>
                  <select class="campo" name="nr_ciclo" id="nr_ciclo">
                     <?php foreach (range(1, 10) as $qtd): ?>
                        <option value="<?= $qtd ?>"><?= $qtd ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="campos">
                  <label class="labels" for="id_local" data-placeholder="Escolha o local">Local</label>
                  <select class="campo" name="id_local" id="id_local">
                     <?php foreach ($locais as $local): ?>
                        <option value="<?= $local['id'] ?>"><?= $local['nome'] ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
               <div class="listaBotoes">
                  <input class="botoes" type="submit" value="Enviar">
                  <input class="botoes" type="reset" value="Limpar">
               </div>
            </div>
      </fieldset>
      </form>
   <?php else: ?>
      <p>Forbidden.</p>
   <?php endif; ?>
<?php else: ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>