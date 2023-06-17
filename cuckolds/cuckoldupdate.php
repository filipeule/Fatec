<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$usuario = $conn->query("SELECT * FROM cornos WHERE id = {$_SESSION['idUsuario']}")->fetch(PDO::FETCH_ASSOC);

?>

<?php if (@validarSessao()) : ?>
   <fieldset class="cadastroForm">
      <legend class="formulario">Seus dados, chifrudo.</legend>
      <form name="form1" action="/sistema_corno/cuckolds/routines/updatecuckold.php" method="post">
         <div class="formulario">
            <div class='campos'>
               <label class='labels' for='id'>ID</label>
               <input class='campo' type='number' name='id' placeholder='ID do usuário' value="<?= $usuario['id'] ?>" readonly>
            </div>
            <div class="campos">
               <label class="labels" for="nome">Nome</label>
               <input class="campo" type="text" name="nome" placeholder="  Digite seu nome:" required maxlength="100" value="<?= $usuario['nome'] ?>">
            </div>
            <div class="campos">
               <label class="labels" for="email">Email</label>
               <input class="campo" type="text" name="email" placeholder="  Digite seu email:" required maxlength="300" value="<?= $usuario['email'] ?>">
            </div>
            <div class="campos">
               <label class="labels" for="senha">Senha</label>
               <input class="campo" type="password" name="senha" placeholder="  Digite seu senha:" required maxlength="20" value="<?= $usuario['senha'] ?>">
            </div>
            <div class="campos">
               <label class="labels" for="cpf">CPF</label>
               <input class="campo" type="text" name="cpf" placeholder="  Digite seu CPF:" required maxlength="14" value="<?= $usuario['cpf'] ?>">
            </div>
            <div class="campos">
               <label class="labels" for="telefone">Telefone</label>
               <input class="campo" type="tel" name="telefone" placeholder="  Digite seu telefone:" required maxlength="11" value="<?= $usuario['telefone'] ?>">
            </div>
            <div class="campos">
               <label class="labels" for="endereco">Endereço</label>
               <input class="campo" type="text" name="endereco" placeholder="  Digite seu endereço:" required value="<?= $usuario['endereco'] ?>">
            </div>
            <div class="listaBotoes">
               <input class="botoes" type="submit" value="Enviar">
               <button class='botoes'><a href="javascript:history.back()">Voltar</a></button>
            </div>
         </div>
   </fieldset>
   </form>

<?php else : ?>
   <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>