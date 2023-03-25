<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Corno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="cabecalho">
            <ul>
                <?php 
                    require_once("funcoes.php");
                    if(validarSessao()) { ?>    
                        <li class="topo-botoes"><a class="topo-botoes-texto" href="cadpessoa.php">Pessoas</a></li>
                        <li class="topo-botoes"><a class="topo-botoes-texto" href="cadstatus.php">Status</a></li>
                        <li class="topo-botoes"><a class="topo-botoes-texto" href="cadturma.php">Turmas</a></li>
                        <li class="topo-botoes"><a class="topo-botoes-texto" href="cadlocal.php">Unidades</a></li>
                        <!-- <li class="topo-botoes"><a href="listarpessoas.php">Listar Pessoas</a></li> -->
                        <li class="topo-botoes"><a class="topo-botoes-texto" href="logout.php">Deslogar</a></li>
                <?php } ?>
            </ul>
        </nav>
        <?php 
            if (@validarSessao()) {
                echo "<span id='usuario'>Usuário: {$_SESSION['nomeUsuario']}</span>";
            }
        ?>
    </header>
    <div class="corpoprincipal">
    <div class="form-wrap">
    <h1>Sistema Corno</h1>