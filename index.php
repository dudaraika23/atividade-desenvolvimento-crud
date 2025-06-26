<?php
include("conexao.php");

$sql = "SELECT * FROM vagas";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Vagas de Estágio</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Vagas de Estágio Disponíveis</h1>
    
    <table>
        <tr>
            <th>Empresa</th>
            <th>Cargo</th>
            <th>Requisitos</th>
            <th>Salário</th>
            <th>Ações</th>
        </tr>
        <?php while($linha = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $linha["empresa"]; ?></td>
            <td><?php echo $linha["cargo"]; ?></td>
            <td><?php echo $linha["requisitos"]; ?></td>
            <td>R$ <?php echo number_format($linha["salario"], 2, ',', '.'); ?></td>
            <td>
                <a class="acao-editar" href="editar.php?id=<?php echo $linha['id']; ?>">Editar</a>
                <a class="acao-excluir" href="excluir.php?id=<?php echo $linha['id']; ?>" onclick="return confirm('Deseja excluir esta vaga?')">Excluir</a>

            </td>
        </tr>
        <?php } ?>
    </table>
    <br><br>
    <a href="cadastrar.php" class="botao">Cadastrar nova vaga</a>
</body>
</html>
