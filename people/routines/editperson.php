<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$sql = "UPDATE cornos SET ";
$nomeSet = isset($_POST['nome']);
$emailSet = isset($_POST['email']);
$cpfSet = isset($_POST['cpf']);
$telefoneSet = isset($_POST['telefone']);
$enderecoSet = isset($_POST['endereco']);
$idTipoCornoSet = isset($_POST['id_tipo_corno']);
$idSet = isset($_POST['id']);
$count = 1;

if ($nomeSet)
  $sql .= "nome = ?, ";
if ($emailSet)
  $sql .= "email = ?, ";
if ($cpfSet)
  $sql .= "cpf = ?, ";
if ($telefoneSet)
  $sql .= "telefone = ?, ";
if ($enderecoSet)
  $sql .= "endereco = ?, ";
if ($idTipoCornoSet)
  $sql .= "id_tipo_corno = ?, ";

$sql = rtrim($sql, ", \t\n");

if ($idSet) {
  $sql .= "WHERE id = ?";
}

$stmt = $conn->prepare($sql);
if ($nomeSet) {
  $stmt->bindParam($count, $_POST['nome'], PDO::PARAM_STR);
  $count++;
}
if ($emailSet) {
  $stmt->bindParam($count, $_POST['email'], PDO::PARAM_STR);
  $count++;
}
if ($cpfSet) {
  $stmt->bindParam($count, $_POST['cpf'], PDO::PARAM_STR);
  $count++;
}
if ($telefoneSet) {
  $stmt->bindParam($count, $_POST['telefone'], PDO::PARAM_STR);
  $count++;
}
if ($enderecoSet) {
  $stmt->bindParam($count, $_POST['endereco'], PDO::PARAM_STR);
  $count++;
}
if ($idTipoCornoSet) {
  $stmt->bindParam($count, $_POST['id_tipo_corno'], PDO::PARAM_INT);
  $count++;
}
if ($idSet) {
  $stmt->bindParam($count, $_POST['id'], PDO::PARAM_INT);
  $count++;
}
$success = $stmt->execute();

?>
  <?php if ($success): ?>
    <p>Registro atualizado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/people/peoplelist.php">aqui</a> para voltar.</p>
  <?php else: ?>
    <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
  <?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>