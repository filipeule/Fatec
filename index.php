<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");

?>

<fieldset class="cadastroForm">
    <legend class="formulario">Login de Cornos</legend>
    <form name="form1" action="/sistema_corno/cuckolds/routines/startsession.php" method="post">
        <div class="formulario">
            <div class="campos">
                <label class="labels" for="email">Email</label>
                <input class="campo" type="text" name="email" placeholder="  Digite seu email:" required
                    maxlength="100">
            </div>
            <div class="campos">
                <label class="labels" for="senha">Senha</label>
                <input class="campo" type="password" name="senha" placeholder="  Digite sua senha:" required
                    maxlength="100">
            </div>
            <div class="listaBotoes">
                <input class="botoes" type="submit" value="Conectar">
                <button class="botoes" type="button" value="Cadastrar"><a href="cadastrar.php">Cadastrar</a></button>
            </div>
        </div>
    </form>
</fieldset>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>