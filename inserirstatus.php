<?php
    require_once("topo.php");
    
        if (
            isset($_POST['descricao']) 
        ) {
            $varDescricao = $_POST['descricao'];

            require_once('.env.php');

            $sql = "insert into tbstatus (descricao) values ('$varDescricao')";

            $conn->exec($sql);
            echo '<p>Salvo com sucesso.</p>';
            echo 'Clique <a href="cadstatus.php">aqui</a> para voltar.</p>';
        } else {
            echo '<p>400 - Bad Request <br> Clique <a href="cadstatus.php">aqui</a> para voltar.</p>';
        }
    ?>
<?php
    require_once("base.php");
?>