<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$sql = "UPDATE cursos SET ";
$nomeSet = isset($_POST['nome']);
$qtdCiclosSet = isset($_POST['qtd_ciclos']);
$statusSet = isset($_POST['id_status']);
$idDuracaoCicloSet = isset($_POST['id_duracao_ciclo']);
$idNivelSet = isset($_POST['id_nivel']);
$idSet = isset($_POST['id']);
$count = 1;

if ($nomeSet)
  $sql .= "nome = ?, ";
if ($qtdCiclosSet)
  $sql .= "qtd_ciclos = ?, ";
if ($statusSet)
  $sql .= "id_status = ?, ";
if ($idDuracaoCicloSet)
  $sql .= "id_duracao_ciclo = ?, ";
if ($idNivelSet)
  $sql .= "id_nivel = ?, ";

$sql = rtrim($sql, ", \t\n");

if ($idSet) {
  $sql .= " WHERE id = ?";
}


$stmt = $conn->prepare($sql);
if ($nomeSet) {
  $stmt->bindParam($count, $_POST['nome'], PDO::PARAM_STR);
  $count++;
}
if ($qtdCiclosSet) {
  $stmt->bindParam($count, $_POST['qtd_ciclos'], PDO::PARAM_INT);
  $count++;
}
if ($statusSet) {
  $stmt->bindParam($count, $_POST['id_status'], PDO::PARAM_INT);
  $count++;
}
if ($idDuracaoCicloSet) {
  $stmt->bindParam($count, $_POST['id_duracao_ciclo'], PDO::PARAM_INT);
  $count++;
}
if ($idNivelSet) {
  $stmt->bindParam($count, $_POST['id_nivel'], PDO::PARAM_INT);
  $count++;
}
if ($idSet) {
  $stmt->bindParam($count, $_POST['id'], PDO::PARAM_INT);
  $count++;
}
$success = $stmt->execute();

?>
<?php if ($success) : ?>
  <p>Registro atualizado com sucesso! Clique <a class="linkVoltar" href="/sistema_corno/courses/info/courselist.php">aqui</a> para voltar.</p>
<?php else : ?>
  <p>Erro ao atualizar registro: <?= $stmt->error ?></p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>