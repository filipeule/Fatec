<?php
    require_once("topo.php");
    
        if (
            isset($_POST['nome']) &&
            isset($_POST['email']) &&
            isset($_POST['senha']) &&
            isset($_POST['cpf']) &&
            isset($_POST['telefone'])
        ) {
            $varNome = $_POST['nome'];
            $varEmail = $_POST['email'];
            $varSenha = $_POST['senha'];
            $varCpf = $_POST['cpf'];
            $varTelefone = $_POST['telefone'];

            require_once('.env.php');

            $sql = "insert into cornos (nome,email,senha,cpf,telefone) values ('$varNome','$varEmail','$varSenha','$varCpf','$varTelefone')";

            $conn->exec($sql);
            echo '<p>Salvo com sucesso.</p>';
        } else {
            echo '<p>400 - Bad Request <br> Clique <a href="cadpessoa.php">aqui</a> para voltar.</p>';
        }
    ?>
<?php
    require_once("base.php");
?>