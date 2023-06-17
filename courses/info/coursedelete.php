<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

$curso = $conn->query("SELECT * FROM cursos WHERE id = {$_GET['id']}")->fetch();

?>

<?php if (@validarSessao()) : ?>
    <?php
    $nivelCurso = $conn->query("SELECT * FROM nivel")->fetchAll();
    $duracaoCurso = $conn->query("SELECT * FROM duracao_ciclo")->fetchAll();
    $statusCurso = $conn->query("SELECT * FROM curso_status")->fetchAll();
    ?>
    <?php if (havePermission('Cursos', 'Criar', 'w')) : ?>
        <fieldset class="cadastroForm">
            <legend>Deletar Curso</legend>
            <h4>Quer mesmo apagar esse curso?</h4>
            <form name="form1" action="/sistema_corno/courses/info/routines/deletecourse.php" method="post">
                <div class="formulario">
                    <div class="campos">
                        <label class="labels" for="id">ID</label>
                        <input class="campo" type="text" name="id" placeholder="Digite o nome do curso:" required maxlength="50" value="<?= $curso['id'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="nome">Nome</label>
                        <input class="campo" type="text" name="nome" placeholder="Digite o nome do curso:" required maxlength="50" value="<?= $curso['nome'] ?>" readonly>
                    </div>
                    <?php if (havePermission('Cursos', 'Nivel', 'r')) : ?>
                        <div class="campos">
                            <label class="labels" for="id_nivel" data-placeholder="Escolha o nível do curso">Nível Curso</label>
                            <?php foreach ($nivelCurso as $nivel) : ?>
                                <?php if ($nivel['id'] == $curso['id_nivel']) : ?>
                                    <input class="campo" type="text" name="id_nivel" value="<?= $nivel['descricao'] ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Duracao', 'r')) : ?>
                        <div class="campos">
                            <label class="labels" for="id_duracao_ciclo" data-placeholder="Escolha a duração do ciclo">Ciclo</label>
                            <?php foreach ($duracaoCurso as $ciclo) : ?>
                                <?php if ($ciclo['id'] == $curso['id_duracao_ciclo']) : ?>
                                    <input class="campo" type="text" name="id_nivel" value="<?= $ciclo['descricao'] ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Quantidade Ciclos', 'r')) : ?>
                        <div class="campos">
                            <label class="labels" for="qtd_ciclos" data-placeholder="Escolha a quantidade de ciclos">Qtd Ciclos</label>
                            <?php foreach (range(1, 10) as $qtd) : ?>
                                <?php if ($qtd == $curso['qtd_ciclos']) : ?>
                                    <input class="campo" type="text" name="id_nivel" value="<?= $qtd ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (havePermission('Cursos', 'Status', 'r')) : ?>
                        <div class="campos">
                            <label class="labels" for="id_status" data-placeholder="Escolha o status do curso">Status</label>
                            <?php foreach ($statusCurso as $status) : ?>
                                <?php if ($status['id'] == $curso['id_status']) : ?>
                                    <input class="campo" type="text" name="id_nivel" value="<?= $status['descricao'] ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="listaBotoes">
                        <input class="botoes" type="submit" value="Enviar">
                        <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
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