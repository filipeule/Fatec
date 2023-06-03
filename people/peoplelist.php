<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$consulta = $conn->query("SELECT * FROM cornos");

?>

<?php if (@validarSessao()): ?>
   <table>
      <caption>
         <h2>Lista de Pessoas</h2>
      </caption>
      <tr>
         <th>Nome</th>
         <th>Email</th>
         <th>CPF</th>
         <th>Telefone</th>
         <th class='jogar-pra-direita'>Editar</th>
         <th class='jogar-pra-direita'>Excluir</th>
      </tr>

      <?php while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
         <tr>
            <td>
               <?= $linha['nome'] ?>
            </td>
            <td>
               <?= $linha['email'] ?>
            </td>
            <td>
               <?= $linha['cpf'] ?>
            </td>
            <td>
               <?= $linha['telefone'] ?>
            </td>
            <td>
               <a href="/sistema_corno/people/personedit.php?id=<?= $linha['id'] ?>" alt='Editar' title='Editar'><span class='campo-tabela jogar-pra-direita'><img src='/sistema_corno/assets/img/edit.png' /></span></a>
            </td>
            <td>
               <a href="/sistema_corno/people/persondelete.php?id=<?= $linha['id'] ?>" alt='Exluir' title='Excluir'><span class='campo-tabela jogar-pra-direita'><img src='/sistema_corno/assets/img/delete.png' /></span></a>
            </td>
         </tr>
      <?php endwhile; ?>

   </table>
<?php else: ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>