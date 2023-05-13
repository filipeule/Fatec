<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$consulta = $conn->query("SELECT * FROM cornos");

?>

<?php if (@validarSessao()): ?>
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
            <th id='edit' class='jogar-pra-direita'>Editar</th>
            <th id='delete' class='jogar-pra-direita'>Excluir</th>
         </tr>
      </thead>

      <tbody>
         <?php while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
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
            <td headers='edit'>
               <a href="/sistema_corno/people/personedit.php?id=<?= $linha['id'] ?>" alt='Editar' title='Editar' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/edit.png' /></a>
            </td>
            <td headers='delete'>
               <a href="/sistema_corno/people/persondelete.php?id=<?= $linha['id'] ?>" alt='Exluir' title='Excluir' class='campo-tabela jogar-para-direita'><img src='/sistema_corno/assets/img/delete.png' /></a>
            </td>
         </tr>
         <?php endwhile; ?>
      </tbody>

   </table>
<?php else: ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>