<?php
    require_once("topo.php");
    if(@validarSessao()) {
?>
    <div class="cadastroForm">
        <h3 class="formulario">Cadastro de Status</h3>
        <form name="form1" action="inserirstatus.php" method="post">
            <div class="formulario">
                <div class="campos">
                    <label class="labels" for="descricao">Descrição</label>
                    <input class="campo" type="text" name="descricao" placeholder="  Digite a descrição:" required maxlength="100">
                </div>
                <div class="listaBotoes">
                    <input class="botoes" type="submit" value="Enviar">
                    <input class="botoes" type="reset" value="Cancelar">
                </div>
            </div>
        </form>
    </div>
<?php
    } else {
    echo "<p>Conecte-se para visualizar esta página.</p>";
    }
    require_once("base.php");
?>