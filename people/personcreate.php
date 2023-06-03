<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/dbconnection.php");

$tipoCorno = $conn->query("SELECT * FROM tipos_corno")->fetchAll();

?>

<?php if (@validarSessao()): ?>
    <?php if (havePermission('Cornos', 'Criar', 'w')): ?>
       <fieldset class="cadastroForm">
          <legend>Cadastro de Cornos</legend>
          <form name="form1" action="/sistema_corno/people/routines/insertperson.php" method="post">
             <div class="formulario">
                <div class="campos">
                   <label class="labels" for="nome">Nome</label>
                   <input class="campo" type="text" name="nome" placeholder="Digite seu nome:" required maxlength="100">
                </div>
                <div class="campos">
                   <label class="labels" for="email">Email</label>
                   <input class="campo" type="text" name="email" placeholder="Digite seu email:" required maxlength="300">
                </div>
                <div class="campos">
                   <label class="labels" for="senha">Senha</label>
                   <input class="campo" type="password" name="senha" placeholder="Digite seu senha:" required maxlength="20">
                </div>
                <div class="campos">
                   <label class="labels" for="cpf">CPF</label>
                   <input class="campo" type="text" name="cpf" placeholder="Digite seu CPF:" required maxlength="14">
                </div>
                <div class="campos">
                   <label class="labels" for="telefone">Telefone</label>
                   <input class="campo" type="tel" name="telefone" placeholder="Digite seu telefone:" required maxlength="11">
                </div>
                <div class="campos">
                   <label class="labels" for="endereco">Endereço</label>
                   <input class="campo" type="text" name="endereco" placeholder="Digite seu endereço:" required maxlength="100">
                </div>
                <?php if (havePermission('Cornos', 'Tipo Corno', 'r')): ?>
                <div class="campos">
                   <label class="labels" for="id_tipo_corno" data-placeholder="Escolha o tipo do chifrudo">Tipo Corno</label>
                   <select class="campo" name="id_tipo_corno" id="id_tipo_corno">
                   <?php if (havePermission('Cornos', 'Tipo Corno', 'w')): ?>
                      <?php foreach ($tipoCorno as $tipo): ?>
                        <option value="<?= $tipo['id'] ?>"><?= $tipo['descricao'] ?></option>
                      <?php endforeach; ?>
                      <?php else: ?>
                        <option value="<?= getCuckoldTypeId('Aluno') ?>">Aluno</option>
                      <?php endif;?>
                   </select>
                   <?php endif;?>
                </div>
                <div class="listaBotoes">
                   <input class="botoes" type="submit" value="Enviar">
                   <input class="botoes" type="reset" value="Limpar">
                </div>
             </div>
       </fieldset>
       </form>
     <?php else: ?>
        <p>Forbidden.</p>
    <?php endif; ?>
<?php else: ?>
     <p>Conecte-se para visualizar esta página.</p>
<?php endif; ?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema_corno/common/footer.php");

?>