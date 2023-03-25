<?php
    require_once("topo.php");
?>
    <div class="cadastroForm">
        <h3 class="formulario">Login de Cornos</h3>
        <form name="form1" action="iniciarsessao.php" method="post">
            <div class="formulario">
                <div class="campos">
                    <label class="labels" for="email">Email</label>
                    <input class="campo" type="text" name="email" placeholder="  Digite seu email:" required maxlength="100">
                </div>
                <div class="campos">
                    <label class="labels" for="senha">Senha</label>
                    <input class="campo" type="password" name="senha" placeholder="  Digite sua senha:" required maxlength="100">
                </div>
                <div class="listaBotoes">
                    <input class="botoes" type="submit" value="Conectar">
                    <button class="botoes" type="button" value="Cadastrar"><a href="cadastrar.php">Cadastrar</a></button>
                </div>
            </div>
        </form>
    </div>
    <?php
    require_once("base.php");
?>