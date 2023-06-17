<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

$turma = $conn->query("SELECT * FROM turmas WHERE id = {$_GET['id']}")->fetch();

?>

<?php if (@validarSessao()): ?>
  <?php
  $periodos = $conn->query("SELECT * FROM periodo")->fetchAll();
  $cursos = $conn->query("SELECT id, nome FROM cursos")->fetchAll();
  $locais = $conn->query("SELECT id, nome FROM locais")->fetchAll();
  ?>
  <?php if (havePermission('Turmas', 'Listar', 'r')): ?>
    <fieldset class="cadastroForm">
      <legend>Editar Turma</legend>
      <form name="form1" action="/sistema_corno/courses/classes/routines/editclass.php" method="post">
        <div class="formulario">
          <div class="campos">
            <label class="labels" for="id">Número Turma</label>
            <input class="campo" type="text" name="id" placeholder="ID:" required maxlength="50" value="<?= $turma['id'] ?>"
              readonly>
          </div>
          <?php if (havePermission('Turmas', 'Periodo', 'r')): ?>
            <div class="campos">
              <label class="labels" for="id_periodo" data-placeholder="Escolha o período do dia">Período</label>
              <?php
              $disabled = setStringIfTrue('disabled', (!havePermission('Turmas', 'Periodo', 'w'))) ?>
              <select class="campo" name="id_periodo" id="id_periodo" <?= $disabled ?>>
                <?php if (havePermission('Turmas', 'Nivel', 'w')): ?>
                  <?php foreach ($periodos as $periodo): ?>
                    <?php $selected = setStringIfTrue('selected', $periodo['id'] == $turma['id_periodo']) ?>
                    <option value="<?= $periodo['id'] ?>" <?= $selected ?>><?= $periodo['descricao'] ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="<?= $turma['id_periodo'] ?>"><?= $periodos[$turma['id_periodo'] - 1]['descricao'] ?>
                  </option>
                <?php endif; ?>
              </select>
            </div>
          <?php endif; ?>
          <?php if (havePermission('Turmas', 'Curso', 'r')): ?>
            <div class="campos">
              <label class="labels" for="id_curso" data-placeholder="Escolha o curso">Curso</label>
              <?php
              $disabled = setStringIfTrue('disabled', (!havePermission('Turmas', 'Curso', 'w'))) ?>
              <select class="campo" name="id_curso" id="id_curso" <?= $disabled ?>>
                <?php if (havePermission('Turmas', 'Curso', 'w')): ?>
                  <?php foreach ($cursos as $curso): ?>
                    <?php $selected = setStringIfTrue('selected', $curso['id'] == $turma['id_curso']) ?>
                    <option value="<?= $curso['id'] ?>" <?= $selected ?>><?= $curso['nome'] ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="<?= $turma['id_curso'] ?>"><?= $cursos[$turma['id_curso'] - 1]['nome'] ?>
                  </option>
                <?php endif; ?>
              </select>
            </div>
          <?php endif; ?>
          <?php if (havePermission('Turmas', 'Ciclo', 'r')): ?>
            <div class="campos">
              <label class="labels" for="ciclo" data-placeholder="Escolha em qual ciclo a turma está">Número Ciclo</label>
              <?php
              $disabled = setStringIfTrue('disabled', (!havePermission('Turmas', 'Ciclo', 'w'))) ?>
              <select class="campo" name="ciclo" id="ciclo" <?= $disabled ?>>
                <?php if (havePermission('Turmas', 'Ciclo', 'w')): ?>
                  <?php foreach (range(1, 10) as $qtd): ?>
                    <?php $selected = setStringIfTrue('selected', $qtd == $turma['ciclo']) ?>
                    <option value="<?= $qtd ?>" <?= $selected ?>><?= $qtd ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="<?= $turma['ciclo'] ?>"><?= $turma['ciclo'] ?>
                  </option>
                <?php endif; ?>
              </select>
            </div>
          <?php endif; ?>
          <?php if (havePermission('Turmas', 'Local', 'r')): ?>
            <div class="campos">
              <label class="labels" for="id_local" data-placeholder="Escolha o local">Local</label>
              <?php
              $disabled = setStringIfTrue('disabled', (!havePermission('Turmas', 'Local', 'w'))) ?>
              <select class="campo" name="id_local" id="id_local" <?= $disabled ?>>
                <?php if (havePermission('Turmas', 'Local', 'w')): ?>
                  <?php foreach ($locais as $local): ?>
                    <?php $selected = setStringIfTrue('selected', $local['id'] == $turma['id_local']) ?>
                    <option value="<?= $local['id'] ?>" <?= $selected ?>><?= $local['nome'] ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="<?= $turma['id_local'] ?>"><?= $locais[$turma['id_local'] - 1]['nome'] ?>
                  </option>
                <?php endif; ?>
              </select>
            </div>
          <?php endif; ?>
          <div class="listaBotoes">
            <?php if (havePermission('Turmas', 'Listar', 'w')): ?>
              <input class='botoes' type='submit' value='Confirmar'>
            <?php endif; ?>
            <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
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