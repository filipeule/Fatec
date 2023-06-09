<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sistema Corno</title>
   <link rel="stylesheet" href="/sistema_corno/assets/css/style.css">
   <link rel="shortcut icon" href="/sistema_corno/assets/img/favicon.png" type="image/png">
</head>

<body>
   <header>
      <nav class="cabecalho">
         <ul>
            <?php if (validarSessao()): ?>
               <?php if (havePermission('Cornos', 'Listar', 'r')): ?>
                  <li class="topo-botoes">
                     <a>Pessoas</a>
                     <ul class="submenu-list">
                        <?php if (havePermission('Cornos', 'Criar', 'w')): ?>
                           <li><a href="/sistema_corno/people/personcreate.php">Cadastrar</a></li>
                        <?php endif; ?>
                        <li><a href="/sistema_corno/people/personsearch.php">Consultar</a></li>
                        <li><a href="/sistema_corno/people/peoplelist.php">Listar</a></li>
                     </ul>
                  </li>
               <?php endif; ?>
               <?php if (havePermission('Cursos', 'Listar', 'r')): ?>
                  <li class="topo-botoes">
                     <a href="">Cursos</a>
                     <ul class="submenu-list">
                        <?php if (havePermission('Cursos', 'Criar', 'w')): ?>
                           <li><a href="/sistema_corno/courses/info/coursecreate.php">Cadastrar</a></li>
                        <?php endif; ?>
                        <li><a href="/sistema_corno/courses/info/courselist.php">Listar</a></li>
                     </ul>
                  </li>
               <?php endif; ?>
               <?php if (havePermission('Turmas', 'Listar', 'r')): ?>
                  <li class="topo-botoes">
                     <a href="">Turmas</a>
                     <ul class="submenu-list">
                        <?php if (havePermission('Turmas', 'Criar', 'w')): ?>
                           <li><a href="/sistema_corno/courses/classes/classcreate.php">Cadastrar</a></li>
                        <?php endif; ?>
                        <li><a href="/sistema_corno/courses/classes/classlist.php">Listar</a></li>
                        <li><a href="/sistema_corno/courses/classes/classsearch.php">Consultar</a></li>
                     </ul>
                  </li>
               <?php endif; ?>
               <?php if (havePermission('Locais', 'Listar', 'r')): ?>
                  <li class="topo-botoes">
                     <a href="">Unidades</a>
                     <ul class="submenu-list">
                        <?php if (havePermission('Locais', 'Criar', 'w')): ?>
                           <li><a href="/sistema_corno/locations/locationcreate.php">Cadastrar</a></li>
                        <?php endif; ?>
                        <li><a href="/sistema_corno/locations/locationslist.php">Listar</a></li>
                        <li><a href="/sistema_corno/locations/locationsearch.php">Consultar</a></li>
                     </ul>
                  </li>
               <?php endif; ?>
               <li class="topo-botoes"><a href="logout.php">
                     <?= $_SESSION['nomeUsuario'] ?>
                  </a>
                  <ul class="submenu-list">
                     <li><a href="/sistema_corno/cuckolds/cuckoldupdate.php">Alterar Dados</a></li>
                     <li><a href="/sistema_corno/cuckolds/routines/logout.php">Deslogar</a></li>
                  </ul>
               </li>
            <?php endif; ?>
         </ul>
      </nav>
   </header>
   <div class="corpoprincipal">
      <div class="form-wrap">
         <h1>Sistema Corno</h1>