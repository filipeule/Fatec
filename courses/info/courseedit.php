<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

$curso = $conn->query("SELECT * FROM cursos WHERE id = {$_GET['id']}")->fetch();

?>

<?php if (@validarSessao()): ?>
    <?php
    $nivelCurso = $conn->query("SELECT * FROM nivel")->fetchAll();
    $duracaoCurso = $conn->query("SELECT * FROM duracao_ciclo")->fetchAll();
    $statusCurso = $conn->query("SELECT * FROM curso_status")->fetchAll();
    ?>
    <?php if (havePermission('Cursos', 'Criar', 'w')): ?>
        <fieldset class="cadastroForm">
            <legend>Editar Curso</legend>
            <form name="form1" action="/sistema_corno/courses/info/routines/editcourse.php" method="post">
                <div class="formulario">
                    <div class="campos">
                        <label class="labels" for="id">ID</label>
                        <input class="campo" type="text" name="id" placeholder="Digite o nome do curso:" required maxlength="50"
                            value="<?= $curso['id'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="nome">Nome</label>
                        <input class="campo" type="text" name="nome" placeholder="Digite o nome do curso:" required
                            maxlength="50" value="<?= $curso['nome'] ?>">
                    </div>
                    <?php if (havePermission('Cursos', 'Nivel', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="id_nivel" data-placeholder="Escolha o nível do curso">Nível Curso</label>
                            <select class="campo" name="id_nivel" id="id_nivel">
                                <?php foreach ($nivelCurso as $nivel): ?>
                                    <?php $selected = setStringIfTrue('selected', $nivel['id'] == $curso['id_nivel']) ?>
                                    <option value="<?= $nivel['id'] ?>" <? $selected ?>><?= $nivel['descricao'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Duracao', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="id_duracao_ciclo" data-placeholder="Escolha a duração do ciclo">Ciclo</label>
                            <select class="campo" name="id_duracao_ciclo" id="id_duracao_ciclo">
                                <option value=""></option>
                                <?php foreach ($duracaoCurso as $ciclo): ?>
                                    <?php $selected = setStringIfTrue('selected', $ciclo['id'] == $curso['id_duracao_ciclo']) ?>
                                    <option value="<?= $ciclo['id'] ?>" <?= $selected ?>> <?= $ciclo['descricao'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Quantidade Ciclos', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="qtd_ciclos" data-placeholder="Escolha a quantidade de ciclos">Qtd
                                Ciclos</label>
                            <select class="campo" name="qtd_ciclos" id="qtd_ciclos">
                                <?php foreach (range(1, 10) as $qtd): ?>
                                    <?php $selected = setStringIfTrue('selected', $qtd == $curso['qtd_ciclos']) ?>
                                    <option value="<?= $qtd ?>" <?= $selected ?>><?= $qtd ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Status', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="id_status" data-placeholder="Escolha o status do curso">Status</label>
                            <select class="campo" name="id_status" id="id_status">
                                <?php foreach ($statusCurso as $status): ?>
                                    <?php $selected = setStringIfTrue('selected', $status['id'] == $curso['id_status']) ?>
                                    <option value="<?= $status['id'] ?>" <?= $selected ?>><?= $status['descricao'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="listaBotoes">
                        <input class="botoes" type="submit" value="Enviar">
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