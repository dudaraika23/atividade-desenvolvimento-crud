<?php
include("conexao.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM vagas WHERE id=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: index.php");
?>
