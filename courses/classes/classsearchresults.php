<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()) : ?>
  <?php
  $stmt = $conn->prepare("SELECT * FROM turmas WHERE id LIKE ?");
  $searchString = "%" . $_POST['id'] . "%";
  $stmt->bindParam(1, $searchString, PDO::PARAM_STR);
  $stmt->execute();
  $deletePermission = havePermission('Turmas', 'Excluir', 'w');
  ?>
  <table>
    <caption>
      Resultado da Pesquisa
    </caption>
    <thead>
      <tr>
        <th id='id'>Número Turma</th>
        <th id='curso'>Curso</th>
        <th id='periodo'>Período</th>
        <th id='ciclo'>Ciclo</th>
        <th id='unidade'>Unidade</th>
        <th id='edit'>Consultar</th>
        <?php if ($deletePermission) : ?>
          <th id='delete'>Excluir</th>
        <?php endif; ?>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $linha) : ?>
        <?php
        $curso = $conn->query("SELECT * FROM cursos WHERE id = {$linha['id_curso']}")->fetch();
        $periodo = $conn->query("SELECT * FROM periodo WHERE id = {$linha['id_periodo']}")->fetch();
        $local = $conn->query("SELECT * FROM locais WHERE id = {$linha['id_local']}")->fetch();
        
        $cuckold = $conn->query("SELECT * FROM cornos WHERE id = {$_SESSION['idUsuario']}")->fetch();

        $cuckoldtype = getCuckoldTypeById($cuckold['id']);
        $cuckoldEditPermission = havePermission('Tipos Corno', $cuckoldtype, 'r');
        $editHidden = setStringIfTrue('hidden', !$cuckoldEditPermission);
        $deleteHidden = setStringIfTrue('hidden', !havePermission('Turmas', 'Excluir', 'w'));

        if (!$cuckoldEditPermission) {
          continue;
        }

        ?>
        <tr>
          <td headers='id'>
            <?php if (havePermission('Turmas', 'Numero Turma', 'r')) : ?>
              <?= $linha['id'] ?>
            <?php endif; ?>
          </td>
          <?php if (havePermission('Turmas', 'Curso', 'rw')) : ?>
            <td headers='curso'>
              <?= $curso['nome'] ?>
            </td>
          <?php endif; ?>
          <td headers='periodo'>
            <?php if (havePermission('Turmas', 'Periodo', 'rw')) : ?>
              <?= $periodo['descricao'] ?>
            <?php endif; ?>
          </td>
          <td headers='ciclo'>
            <?php if (havePermission('Turmas', 'Ciclo', 'rw')) : ?>
              <?= $linha['ciclo'] ?>
            <?php endif; ?>
          </td>
          <td headers='unidade'>
            <?php if (havePermission('Turmas', 'Local', 'rw')) : ?>
              <?= $local['nome'] ?>
            <?php endif; ?>
          </td>
          <?php if ($cuckoldEditPermission) : ?>
            <td headers='edit'>
              <a href="/sistema_corno/courses/classes/classedit.php?id=<?= $linha['id'] ?>" alt='Editar' title='Editar' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png' <?= $editHidden ?> /></a>
            </td>
          <?php endif; ?>
          <?php if ($deletePermission) : ?>
            <td headers='delete'>
              <a href="/sistema_corno/courses/classes/classdelete.php?id=<?= $linha['id'] ?>" alt='Exluir' title='Excluir' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png' <?= $deleteHidden ?> /></a>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
<?php else : ?>
  <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>