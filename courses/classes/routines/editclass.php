<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$sql = "UPDATE turmas SET ";
$idSet = isset($_POST['id']);
$periodoSet = isset($_POST['id_periodo']);
$cursoSet = isset($_POST['id_curso']);
$nrCicloSet = isset($_POST['ciclo']);
$localSet = isset($_POST['local']);
$count = 1;

if ($periodoSet)
  $sql .= "id_periodo = ?, ";
if ($cursoSet)
  $sql .= "id_curso = ?, ";
if ($nrCicloSet)
  $sql .= "ciclo = ?, ";
if ($localSet)
  $sql .= "local = ?, ";

$sql = rtrim($sql, ", \t\n");

if ($idSet) {
  $sql .= " WHERE id = ?";
}


$stmt = $conn->prepare($sql);
if ($periodoSet) {
  $stmt->bindParam($count, $_POST['id_periodo'], PDO::PARAM_INT);
  $count++;
}
if ($cursoSet) {
  $stmt->bindParam($count, $_POST['id_curso'], PDO::PARAM_INT);
  $count++;
}
if ($nrCicloSet) {
  $stmt->bindParam($count, $_POST['ciclo'], PDO::PARAM_INT);
  $count++;
}
if ($localSet) {
  $stmt->bindParam($count, $_POST['local'], PDO::PARAM_INT);
  $count++;
}
if ($idSet) {
  $stmt->bindParam($count, $_POST['id'], PDO::PARAM_INT);
  $count++;
}
$success = $stmt->execute();

?>
<?php if ($success) : ?>
  <p>Registro atualizado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/courses/classes/classlist.php">aqui</a> para voltar.</p>
<?php else : ?>
  <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>