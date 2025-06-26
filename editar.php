<?php
include("conexao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $empresa = $_POST["empresa"];
        $cargo = $_POST["cargo"];
        $requisitos = $_POST["requisitos"];
        $salario = $_POST["salario"];

        $sql = "UPDATE vagas SET empresa=?, cargo=?, requisitos=?, salario=? WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssdi", $empresa, $cargo, $requisitos, $salario, $id);
        $stmt->execute();

        header("Location: index.php");
    } else {
        $sql = "SELECT * FROM vagas WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Vaga</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Editar Vaga</h1>
    <form method="post">
        <label>Empresa:</label><input type="text" name="empresa" value="<?php echo $resultado['empresa']; ?>"><br>
        <label>Cargo:</label><input type="text" name="cargo" value="<?php echo $resultado['cargo']; ?>"><br>
        <label>Requisitos:</label><textarea name="requisitos"><?php echo $resultado['requisitos']; ?></textarea><br>
        <label>Salário:</label><input type="number" step="0.01" name="salario" value="<?php echo $resultado['salario']; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
