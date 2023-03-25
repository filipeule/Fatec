<?php
require_once("topo.php");
require_once(".env.php");
require_once("funcoes.php");
session_destroy();
session_start();
try{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //verificar se o formulário foi preenchido
    if(isset($_POST['email']) && isset($_POST['senha'])){
        //capturar os valores dos campos do formulário
        //e colocar nas variáveis
        $varEmail = testarEntrada($_POST['email']);
        $varSenha = testarEntrada($_POST['senha']);
        $sql = "SELECT * from cornos where 
        email= ? and senha= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $varEmail, PDO::PARAM_STR);
        $stmt->bindParam(2, $varSenha, PDO::PARAM_STR);
        $stmt->execute();
        //while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($stmt->rowCount() == 1){
            echo "<p>Login ok";
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nomeUsuario'] = $linha['nome'];
            $_SESSION['idUsuario'] = $linha['id'];
            header("location:listarpessoas.php");
        }else{
            session_unset();
            echo "<p>Login inválido</p>";
        }
    }//fim do if
    else {
        echo "<p>Você deve preencher todos os campos
        do formulário, clique 
        <a href='login.php'>aqui</a>
         para voltar.</p>";
    }
    }//fim do if server post
    else {
        echo "<p>Problemas ao realizar o envio dos
        dados do formulário, clique 
            <a href='login.php'>aqui</a>
            para voltar.</p>";
    }
}catch(Exception $e) {
    echo "<p class='erro'>Ocorreu um erro: " . $e->getMessage() . "</p>";
}
require_once("base.php");
?>