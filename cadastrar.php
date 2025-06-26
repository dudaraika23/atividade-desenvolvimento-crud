<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $_POST["empresa"];
    $cargo = $_POST["cargo"];
    $requisitos = $_POST["requisitos"];
    $salario = $_POST["salario"];

    $sql = "INSERT INTO vagas (empresa, cargo, requisitos, salario) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssd", $empresa, $cargo, $requisitos, $salario);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Vaga</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Cadastrar Nova Vaga</h1>
    <form method="post">
        <label>Empresa:</label><input type="text" name="empresa" required><br>
        <label>Cargo:</label><input type="text" name="cargo" required><br>
        <label>Requisitos:</label><textarea name="requisitos" required></textarea><br>
        <label>Salário:</label><input type="number" step="0.01" name="salario" required><br>
        <input type="submit" value="Salvar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
