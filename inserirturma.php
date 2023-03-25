<?php
    require_once("topo.php");
    // require_once("funcoes.php");
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                isset($_POST['nome']) &&
                isset($_POST['nivel']) &&
                isset($_POST['faixaetariaminima']) &&
                isset($_POST['faixaetariamaxima']) &&
                isset($_POST['status'])
            ) {
                $varNome = $_POST['nome'];
                $varNivel = $_POST['nivel'];
                $varFaixaEtariaMinima = $_POST['faixaetariaminima'];
                $varFaixaEtariaMaxima = $_POST['faixaetariamaxima'];
                $varStatus = $_POST['status'];
    
                require_once('.env.php');
    
                $sql = "insert into tbcursos (nome,nivel,faixaetariaminima,faixaetariamaxima,status) values (:nome, :nivel, :faixaetariaminima, :faixaetariamaxima, :status)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nome', $varNome);
                $stmt->bindParam(':nivel', $varNivel);
                $stmt->bindParam(':faixaetariaminima', $varFaixaEtariaMinima);
                $stmt->bindParam(':faixaetariamaxima', $varFaixaEtariaMaxima);
                $stmt->bindParam(':status', $varStatus);
                $stmt->execute();

                echo '<p>Salvo com sucesso.</p>';
                echo '<p>Clique <a href="cadturma.php">aqui</a> para voltar.</p>';
            } else {
                echo '<p>400 - Bad Request <br> Clique <a href="cadturma.php">aqui</a> para voltar.</p>';
            }
        }
    } catch (PDOException $e) {
        echo "<p>Hacker FDP</p>";
        echo "<p>" . $e->getMessage() . "</p>";
    }
    ?>
<?php
    require_once("base.php");
?>