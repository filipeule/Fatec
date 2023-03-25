<?php
    require_once("topo.php");
    
        if (
            isset($_POST['nome']) &&
            isset($_POST['endereco']) &&
            isset($_POST['telefone']) &&
            isset($_POST['responsavel'])
        ) {
            $varNome = $_POST['nome'];
            $varEndereco = $_POST['endereco'];
            $varTelefone = $_POST['telefone'];
            $varResponsavel = $_POST['responsavel'];

            require_once('.env.php');

            $sql = "insert into tblocais (nome,endereco,telefone,responsavel) values ('$varNome','$varEndereco','$varTelefone','$varResponsavel')";

            $conn->exec($sql);
            echo '<p>Salvo com sucesso.</p>';
            echo '<p>Clique <a href="cadlocal.php">aqui</a> para voltar.</p>';
        } else {
            echo '<p>400 - Bad Request <br> Clique <a href="cadlocal.php">aqui</a> para voltar.</p>';
        }
    ?>
<?php
    require_once("base.php");
?>