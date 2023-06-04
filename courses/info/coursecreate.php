<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

?>

<?php if (@validarSessao()) : ?>
   <?php
   $nivelCurso = $conn->query("SELECT * FROM nivel")->fetchAll();
   $duracaoCurso = $conn->query("SELECT * FROM duracao_ciclo")->fetchAll();
   $statusCurso = $conn->query("SELECT * FROM curso_status")->fetchAll();
   ?>
   <?php if (havePermission('Cursos', 'Criar', 'w')) : ?>
      <fieldset class="cadastroForm">
         <legend>Cadastro de Cursos</legend>
         <form name="form1" action="/sistema_corno/courses/info/routines/insertcourse.php" method="post">
            <div class="formulario">
               <div class="campos">
                  <label class="labels" for="nome">Nome</label>
                  <input class="campo" type="text" name="nome" placeholder="Digite o nome do curso:" required maxlength="50">
               </div>
               <?php if (havePermission('Cursos', 'Nivel', 'r')) : ?>
                  <div class="campos">
                     <label class="labels" for="id_nivel" data-placeholder="Escolha o nível do curso">Nível Curso</label>
                     <select class="campo" name="id_nivel" id="id_nivel">
                        <?php foreach ($nivelCurso as $nivel) : ?>
                           <option value="<?= $nivel['id'] ?>"><?= $nivel['descricao'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               <?php endif; ?>
               <?php if (havePermission('Cursos', 'Duracao', 'r')) : ?>
                  <div class="campos">
                     <label class="labels" for="id_duracao_ciclo" data-placeholder="Escolha a duração do ciclo">Ciclo</label>
                     <select class="campo" name="id_duracao_ciclo" id="id_duracao_ciclo">
                        <?php foreach ($duracaoCurso as $ciclo) : ?>
                           <option value="<?= $ciclo['id'] ?>"><?= $ciclo['descricao'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               <?php endif; ?>
               <?php if (havePermission('Cursos', 'Quantidade Ciclos', 'r')) : ?>
                  <div class="campos">
                     <label class="labels" for="qtd_ciclos" data-placeholder="Escolha a quantidade de ciclos">Qtd Ciclos</label>
                     <select class="campo" name="qtd_ciclos" id="qtd_ciclos">
                        <?php foreach (range(1, 10) as $qtd) : ?>
                           <option value="<?= $qtd ?>"><?= $qtd ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               <?php endif; ?>
               <?php if (havePermission('Cursos', 'Status', 'r')) : ?>
                  <div class="campos">
                     <label class="labels" for="id_status" data-placeholder="Escolha o status do curso">Status</label>
                     <select class="campo" name="id_status" id="id_status">
                        <?php foreach ($statusCurso as $status) : ?>
                           <option value="<?= $status['id'] ?>"><?= $status['descricao'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               <?php endif; ?>
               <div class="listaBotoes">
                  <input class="botoes" type="submit" value="Enviar">
                  <input class="botoes" type="reset" value="Limpar">
               </div>
            </div>
      </fieldset>
      </form>
   <?php else : ?>
      <p>Forbidden.</p>
   <?php endif; ?>
<?php else : ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>