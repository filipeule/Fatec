<?php
    require_once("topo.php");
    if(@validarSessao()) {
?>
    <div class="cadastroForm">
        <h3 class="formulario">Cadastro de Cornos - RP</h3>
        <form name="form1" action="inserirpessoa.php" method="post">
            <div class="formulario">
                <div class="campos">
                    <label class="labels" for="nome">Nome</label>
                    <input class="campo" type="text" name="nome" placeholder="  Digite seu nome:" required maxlength="100">
                </div>
                <div class="campos">
                    <label class="labels" for="email">Email</label>
                    <input class="campo" type="text" name="email" placeholder="  Digite seu email:" required maxlength="300">
                </div>
                <div class="campos">
                    <label class="labels" for="senha">Senha</label>
                    <input class="campo" type="password" name="senha" placeholder="  Digite seu senha:" required maxlength="20">
                </div>
                <div class="campos">
                    <label class="labels" for="cpf">CPF</label>
                    <input class="campo" type="text" name="cpf" placeholder="  Digite seu CPF:" required maxlength="14">
                </div>
                <div class="campos">
                    <label class="labels" for="telefone">Telefone</label>
                    <input class="campo" type="tel" name="telefone" placeholder="  Digite seu telefone:" required maxlength="11">
                </div>
                <div class="listaBotoes">
                    <input class="botoes" type="submit" value="Enviar">
                    <input class="botoes" type="reset" value="Cancelar">
                </div>
            </div>
    </div>
    </form>

<?php
    } else {
    echo "<p>Conecte-se para visualizar esta página.</p>";
    }
    require_once("base.php");
?>