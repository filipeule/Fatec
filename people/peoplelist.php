<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/routines/functions.php");

?>

<?php if (@validarSessao()): ?>
  <?php
  $consulta = $conn->query("SELECT * FROM cornos");
  $editPermission = havePermission('Cornos', 'Listar', 'r');
  $deletePermission = havePermission('Cornos', 'Excluir', 'w');
  ?>
  <?php if (havePermission('Cornos', 'Listar', 'r')): ?>
    <table>
      <caption>
        Lista de Pessoas
      </caption>
      <thead>
        <tr>
          <th id='name'>Nome</th>
          <th id='email'>Email</th>
          <th id='personal_id'>CPF</th>
          <th id='phone'>Telefone</th>
          <!-- <th id='edit' class='jogar-pra-direita'>Editar</th> -->
          <?php if ($editPermission): ?>
            <th id='edit'>Editar</th>
          <?php endif; ?>
          <!-- <th id='delete' class='jogar-pra-direita'>Excluir</th> -->
          <?php if ($deletePermission): ?>
            <th id='delete'>Excluir</th>
          <?php endif; ?>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($consulta->fetchAll(PDO::FETCH_ASSOC) as $linha): ?>
          <?php
          $cuckoldtype = getCuckoldTypeById($linha['id_tipo_corno']);
          $editHidden = setStringIfTrue('hidden', !havePermission('Tipos Corno', $cuckoldtype, 'r'));
          $deleteHidden = setStringIfTrue('hidden', (!havePermission('Tipos Corno', $cuckoldtype, 'w') or $cuckoldtype == 'Administrador'));

          ?>
          <tr>
            <td headers='name'>
              <?= $linha['nome'] ?>
            </td>
            <td headers='email'>
              <?= $linha['email'] ?>
            </td>
            <td headers='personal_id'>
              <?= $linha['cpf'] ?>
            </td>
            <td headers='phone'>
              <?= $linha['telefone'] ?>
            </td>
            <?php if ($editPermission): ?>
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
    <p>Forbidden.</p>
  <?php endif; ?>
<?php else: ?>
  <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>