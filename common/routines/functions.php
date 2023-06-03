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

function getPermissionLevel($secao, $campo)
{
  require($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
  $userLevel = $conn->query("SELECT id_tipo_corno FROM cornos WHERE id = " . $_SESSION['idUsuario'])->fetchAll()[0][0];
  $sql = "SELECT pc.nivel_acesso FROM tipos_corno c, permissoes p, permissoes_tipos_corno pc WHERE c.id = pc.id_tipo_corno AND p.id_permissao = pc.id_permissao AND c.id =" . $userLevel . " AND p.secao = '" . $secao . "' AND p.campo = '" . $campo . "'";
  $permissionLevel = $conn->query($sql)->fetchAll()[0][0];
  return $permissionLevel;
}

function checkFieldDisabled($secao, $campo)
{
  $disabled = 'disabled';
  if (havePermission($secao, $campo, 'w')) {
    $disabled = '';
  }
  return $disabled;
}

function checkSelected($id, $otherId)
{
  $selected = '';
  if ($id == $otherId) {
    $selected = 'selected';
  }
  return $selected;
}

function getInfo($field, $table, $targetColumn, $target)
{
  require($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
  $info = $conn->query("SELECT $field FROM $table WHERE $targetColumn = '$target'")->fetch()[0];
  return $info;
}

function getCuckoldTypeById($id)
{
  $cuckoldType = getInfo('descricao', 'tipos_corno', 'id', $id);
  return $cuckoldType;
}

function getCuckoldTypeId($target)
{
  $targetId = getInfo('id', 'tipos_corno', 'descricao', $target);
  return $targetId;
}

function haveReadPermission($secao, $campo)
{
  $permissionLevel = getPermissionLevel($secao, $campo);
  return ($permissionLevel == 1 or $permissionLevel == 3);
}
function haveWritePermission($secao, $campo)
{
  $permissionLevel = getPermissionLevel($secao, $campo);
  return ($permissionLevel == 2 or $permissionLevel == 3);
}

function haveReadWritePermission($secao, $campo)
{
  $permissionLevel = getPermissionLevel($secao, $campo);
  return ($permissionLevel == 3);
}

function havePermission($secao, $campo, $mode)
{
  switch ($mode) {
    case 'r':
      return haveReadPermission($secao, $campo);
    case 'w':
      return haveWritePermission($secao, $campo);
    case 'rw':
      return haveReadWritePermission($secao, $campo);
    default:
      return false;
  }
}