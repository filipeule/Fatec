<?php
// http://localhost/sistema_corno/common/dbconnection.php

function testarEntrada($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    return $data;
}

function validarSessao()
{
    session_start();
    if (!isset($_SESSION['idUsuario'])) {
        return false;
    } else {
        return true;
    }
}

function isAdmin()
{
    require($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
    $userType = $conn->query("SELECT id_tipo_corno FROM cornos WHERE id = " . $_SESSION['idUsuario'])->fetchAll()[0][0];
    return $userType == 1;
}

function havePermission() {
    
}
