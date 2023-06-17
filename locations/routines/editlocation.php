<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$sql = "UPDATE locais SET ";
$nomeSet = isset($_POST['nome']);
$enderecoSet = isset($_POST['endereco']);
$telefoneSet = isset($_POST['telefone']);
$idResponsavelSet = isset($_POST['id_responsavel']);
$idSet = isset($_POST['id']);
$count = 1;

if ($nomeSet)
  $sql .= "nome = ?, ";
if ($enderecoSet)
  $sql .= "endereco = ?, ";
if ($telefoneSet)
  $sql .= "telefone = ?, ";
if ($idResponsavelSet)
  $sql .= "id_responsavel = ?, ";

$sql = rtrim($sql, ", \t\n");

if ($idSet) {
  $sql .= " WHERE id = ?";
}

$stmt = $conn->prepare($sql);
if ($nomeSet) {
  $stmt->bindParam($count, $_POST['nome'], PDO::PARAM_STR);
  $count++;
}
if ($enderecoSet) {
  $stmt->bindParam($count, $_POST['endereco'], PDO::PARAM_STR);
  $count++;
}
if ($telefoneSet) {
  $stmt->bindParam($count, $_POST['telefone'], PDO::PARAM_STR);
  $count++;
}
if ($idResponsavelSet) {
  $stmt->bindParam($count, $_POST['id_responsavel'], PDO::PARAM_INT);
  $count++;
}
if ($idSet) {
  $stmt->bindParam($count, $_POST['id'], PDO::PARAM_INT);
  $count++;
}
$success = $stmt->execute();


?>
  <?php if ($success): ?>
    <p>Registro atualizado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/locations/locationslist.php">aqui</a> para voltar.</p>
  <?php else: ?>
    <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
  <?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>