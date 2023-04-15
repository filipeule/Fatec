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
                        <li class="topo-botoes">
                            <a>Pessoas</a>
                            <ul class="submenu-list">
                                <li><a href="cadpessoa.php">Cadastrar</a></li>
                                <li><a href="listarpessoas.php">Listar</a></li>
                                <li><a href="consultarpessoas.php">Consultar</a></li>
                            </ul>
                        </li>
                        <li class="topo-botoes">
                            <a href="">Status</a>
                            <ul class="submenu-list">
                                <li><a href="cadstatus.php">Cadastrar</a></li>
                                <li><a href="">Listar</a></li>
                            </ul>
                        </li>
                        <li class="topo-botoes">
                            <a href="">Turmas</a>
                            <ul class="submenu-list">
                                <li><a href="cadturma.php">Cadastrar</a></li>
                                <li><a href="">Listar</a></li>
                                <li><a href="">Consultar</a></li>
                            </ul>
                        </li>
                        <li class="topo-botoes">
                            <a href="">Unidades</a>
                            <ul class="submenu-list">
                                <li><a href="cadlocal.php">Cadastrar</a></li>
                                <li><a href="">Listar</a></li>
                                <li><a href="">Consultar</a></li>
                            </ul>
                        </li>
                        <li class="topo-botoes">
                            <a href="logout.php">Deslogar</a>
                        </li>
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