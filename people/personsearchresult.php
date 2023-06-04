<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()): ?>
  <?php
  $stmt = $conn->prepare("SELECT * FROM cornos WHERE nome like ? ");
  $searchString = "%" . $_POST['nome'] . "%";
  $stmt->bindParam(1, $searchString, PDO::PARAM_STR);
  $stmt->execute();
  $deletePermission = havePermission('Cornos', 'Excluir', 'w');
  ?>
  <table>
    <caption>
      Resultado da Pesquisa
    </caption>
    <thead>
      <tr>
        <th id='name'>Nome</th>
        <th id='email'>Email</th>
        <th id='personal_id'>CPF</th>
        <th id='phone'>Telefone</th>
        <th id='edit'>Consultar</th>
        <?php if ($deletePermission): ?>
          <th id='delete'>Excluir</th>
        <?php endif; ?>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $linha): ?>
        <?php
        $cuckoldtype = getCuckoldTypeById($linha['id']);
        $cuckoldEditPermission = havePermission('Tipos Corno', $cuckoldtype, 'r');
        $editHidden = setStringIfTrue('hidden', !$cuckoldEditPermission);
        $deleteHidden = setStringIfTrue('hidden', !havePermission('Tipos Corno', $cuckoldtype, 'w'));

        if (!$cuckoldEditPermission) {
          continue;
        }

        ?>
        <tr>
          <td headers='name'>
              <?php if (havePermission('Cornos', 'Nome', 'r')): ?>
              <?= $linha['nome'] ?>
              <?php endif; ?>
            </td>
          <?php if (havePermission('Cornos', 'Email', 'r')): ?>
          <td headers='email'>
            <?= $linha['email'] ?>
          </td>
          <?php endif; ?>
          <td headers='personal_id'>
            <?php if (havePermission('Cornos', 'CPF', 'r')): ?>
            <?= $linha['cpf'] ?>
            <?php endif; ?>
          </td>
          <td headers='phone'>
            <?php if (havePermission('Cornos', 'Telefone', 'r')): ?>
            <?= $linha['telefone'] ?>
            <?php endif; ?>
          </td>
          <?php if ($cuckoldEditPermission): ?>
            <td headers='edit'>
              <a href="/sistema_corno/people/personedit.php?id=<?= $linha['id'] ?>" alt='Editar' title='Editar'
                class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png' <?= $editHidden ?> /></a>
            </td>
          <?php endif; ?>
          <?php if ($deletePermission): ?>
            <td headers='delete'>
              <a href="/sistema_corno/people/persondelete.php?id=<?= $linha['id'] ?>" alt='Exluir' title='Excluir'
                class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png' <?= $deleteHidden ?> /></a>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
<?php else: ?>
  <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>