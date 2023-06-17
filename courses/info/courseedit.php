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
    <?php if (havePermission('Cursos', 'Listar', 'r')): ?>
        <fieldset class="cadastroForm">
            <legend>Editar Curso</legend>
            <form name="form1" action="/sistema_corno/courses/info/routines/editcourse.php" method="post">
                <div class="formulario">
                    <div class="campos">
                        <label class="labels" for="id" hidden>ID</label>
                        <input class="campo" type="text" name="id" placeholder="ID:" required maxlength="50"
                            value="<?= $curso['id'] ?>" readonly hidden>
                    </div>
                    <div class="campos">
                        <?php
                        $disabled = setStringIfTrue('disabled', (!havePermission('Cursos', 'Nome', 'w'))) ?>
                        <label class="labels" for="nome">Nome</label>
                        <input class="campo" type="text" name="nome" placeholder="Digite o nome do curso:" required
                            maxlength="50" value="<?= $curso['nome'] ?>" <?= $disabled ?>>
                    </div>
                    <?php if (havePermission('Cursos', 'Nivel', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="id_nivel" data-placeholder="Escolha o nível do curso">Nível Curso</label>
                            <?php
                            $disabled = setStringIfTrue('disabled', (!havePermission('Cursos', 'Nivel', 'w'))) ?>
                            <select class="campo" name="id_nivel" id="id_nivel" <?= $disabled ?>>
                                <?php if (havePermission('Cursos', 'Nivel', 'w')): ?>
                                    <?php foreach ($nivelCurso as $nivel): ?>
                                        <?php $selected = setStringIfTrue('selected', $nivel['id'] == $curso['id_nivel']) ?>
                                        <option value="<?= $nivel['id'] ?>" <?= $selected ?>><?= $nivel['descricao'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="<?= $curso['id_nivel'] ?>"><?= $nivelCurso[$curso['id_nivel'] - 1]['descricao'] ?>
                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Duracao', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="id_duracao_ciclo" data-placeholder="Escolha a duração do ciclo">Ciclo</label>
                            <?php
                            $disabled = setStringIfTrue('disabled', (!havePermission('Cursos', 'Duracao', 'w'))) ?>
                            <select class="campo" name="id_duracao_ciclo" id="id_duracao_ciclo" <?= $disabled ?>>
                                <?php if (havePermission('Cursos', 'Duracao', 'w')): ?>
                                    <?php foreach ($duracaoCurso as $ciclo): ?>
                                        <?php $selected = setStringIfTrue('selected', $ciclo['id'] == $curso['id_duracao_ciclo']) ?>
                                        <option value="<?= $ciclo['id'] ?>" <?= $selected ?>> <?= $ciclo['descricao'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="<?= $curso['id_duracao_ciclo'] ?>"><?= $duracaoCurso[$curso['id_duracao_ciclo'] - 1]['descricao'] ?>
                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Quantidade Ciclos', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="qtd_ciclos" data-placeholder="Escolha a quantidade de ciclos">Qtd
                                Ciclos</label>
                            <?php
                            $disabled = setStringIfTrue('disabled', (!havePermission('Cursos', 'Quantidade Ciclos', 'w'))) ?>
                            <select class="campo" name="qtd_ciclos" id="qtd_ciclos" <?= $disabled ?>>
                                <?php if (havePermission('Cursos', 'Quantidade Ciclos', 'w')): ?>
                                    <?php foreach (range(1, 10) as $qtd): ?>
                                        <?php $selected = setStringIfTrue('selected', $qtd == $curso['qtd_ciclos']) ?>
                                        <option value="<?= $qtd ?>" <?= $selected ?>><?= $qtd ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="<?= $curso['qtd_ciclos'] ?>"><?= $curso['qtd_ciclos'] ?>
                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Status', 'r')): ?>
                        <div class="campos">
                            <label class="labels" for="id_status" data-placeholder="Escolha o status do curso">Status</label>
                            <?php
                            $disabled = setStringIfTrue('disabled', (!havePermission('Cursos', 'Status', 'w'))) ?>
                            <select class="campo" name="id_status" id="id_status" <?= $disabled ?>>
                                <?php if (havePermission('Cursos', 'Status', 'w')): ?>
                                    <?php foreach ($statusCurso as $status): ?>
                                        <?php $selected = setStringIfTrue('selected', $status['id'] == $curso['id_status']) ?>
                                        <option value="<?= $status['id'] ?>" <?= $selected ?>><?= $status['descricao'] ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="<?= $curso['id_status'] ?>"><?= $statusCurso[$curso['id_status'] - 1]['descricao'] ?>
                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                    <div class="listaBotoes">
                        <?php if (havePermission('Locais', 'Listar', 'w')): ?>
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