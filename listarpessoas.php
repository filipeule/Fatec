<?php
require_once("topo.php");
require_once (".env.php");
if(@validarSessao()) {
    $consulta = $conn->query("SELECT * FROM cornos");
    echo "<table>";

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
                    <a href='editarpessoa.php?id={$linha['id']}' alt='Editar' title='Editar'><span class='campo-tabela jogar-pra-direita'>Editar</span></a>
                </td>
                <td>
                    <a href='excluirpessoa.php?id={$linha['id']}' alt='Exluir' title='Excluir'><span class='campo-tabela jogar-pra-direita'>Excluir</span></a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>Conecte-se para visualizar esta página.</p>";
}
require_once("base.php");
?>