<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

$turma = $conn->query("SELECT * FROM turmas WHERE id = {$_GET['id']}")->fetch();

?>

<?php if (@validarSessao()) : ?>
    <?php
    $curso = $conn->query("SELECT * FROM cursos WHERE id = {$turma['id_curso']}")->fetch();
    $periodo = $conn->query("SELECT * FROM periodo WHERE id = {$turma['id_periodo']}")->fetch();
    $local = $conn->query("SELECT * FROM locais WHERE id = {$turma['id_local']}")->fetch();
    ?>
    <?php if (havePermission('Cursos', 'Excluir', 'w')) : ?>
        <fieldset class="cadastroForm">
            <legend>Deletar Turma</legend>
            <h4>Quer mesmo apagar essa turma?</h4>
            <form name="form1" action="/sistema_corno/courses/classes/routines/deleteclass.php" method="post">
                <div class="formulario">
                    <div class="campos">
                        <label class="labels" for="id">Turma</label>
                        <input class="campo" type="text" name="id" placeholder="Número da turma:" required maxlength="50" value="<?= $turma['id'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="nome">Curso</label>
                        <input class="campo" type="text" name="id_curso" placeholder="Curso:" required maxlength="50" value="<?= $curso['nome'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="nome">Período</label>
                        <input class="campo" type="text" name="id_periodo" placeholder="Período:" required maxlength="50" value="<?= $periodo['descricao'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="nome">Ciclo</label>
                        <input class="campo" type="text" name="nome" placeholder="Ciclo:" required maxlength="50" value="<?= $turma['ciclo'] ?>" readonly>
                    </div>
                    <div class="campos">
                        <label class="labels" for="nome">Unidade</label>
                        <input class="campo" type="text" name="nome" placeholder="Unidade:" required maxlength="50" value="<?= $local['nome'] ?>" readonly>
                    </div>
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