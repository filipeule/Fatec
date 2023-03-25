<?php
    require_once("topo.php");
    require_once(".env.php");

    $usuario = $conn->query("SELECT * FROM cornos WHERE id = {$_GET['id']}")->fetch(PDO::FETCH_ASSOC);

    echo "<div class='cadastroForm'>
            <h3 class='formulario'>Editar Corno</h3>
            <form name='form1' action='inserirpessoa.php' method='post'>
                <div class='formulario'>
                    <div class='campos'>
                        <label class='labels' for='nome'>Nome</label>
                        <input class='campo' type='text' name='nome' placeholder='  Digite seu nome:' required maxlength='100' value='{$usuario['nome']}'>
                    </div>
                    <div class='campos'>
                        <label class='labels' for='email'>Email</label>
                        <input class='campo' type='text' name='email' placeholder='  Digite seu email:' required maxlength='300' value='{$usuario['email']}'>
                    </div>
                    <div class='campos'>
                        <label class='labels' for='cpf'>CPF</label>
                        <input class='campo' type='text' name='cpf' placeholder='  Digite seu CPF:' required maxlength='14' value='{$usuario['cpf']}'>
                    </div>
                    <div class='campos'>
                        <label class='labels' for='telefone'>Telefone</label>
                        <input class='campo' type='tel' name='telefone' placeholder='  Digite seu telefone:' required maxlength='11' value='{$usuario['telefone']}'>
                    </div>
                    <div class='listaBotoes'>
                        <input class='botoes' type='submit' value='Confirmar'>
                        <input class='botoes' type='reset' value='Cancelar'>
                    </div>
                </div>
        </div>
        </form>";

    require_once("base.php");
?>