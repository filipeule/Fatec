<?php
require_once("topo.php");
require_once (".env.php");
if(@validarSessao()) {
    $consulta = $conn->query("SELECT * FROM cornos");
    echo "<table>";
    echo "<caption><h2>Lista de Pessoas</h2></caption>";
    echo "<tr>
        <th>CPF</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th class='jogar-pra-direita'>Editar</th>
        <th class='jogar-pra-direita'>Excluir</th>
        </tr>
    ";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>
                    {$linha['cpf']}
                </td>
                <td>
                    {$linha['nome']}
                </td>
                <td>
                    {$linha['email']}
                </td>
                <td>
                    <a href='editarpessoa.php?id={$linha['id']}' alt='Editar' title='Editar'><span class='campo-tabela jogar-pra-direita'><img src='assets/images/edit.png'/></span></a>
                </td>
                <td>
                    <a href='excluirpessoa.php?id={$linha['id']}' alt='Exluir' title='Excluir'><span class='campo-tabela jogar-pra-direita'><img src='assets/images/delete.png'/></span></a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>Conecte-se para visualizar esta página.</p>";
}
require_once("base.php");
?>