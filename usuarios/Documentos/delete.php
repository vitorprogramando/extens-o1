<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
    exit();
}

if (!isset($_GET['id'])) {
    die('ID do documento não especificado.');
}

$id = $_GET['id'];

$mysqli = new mysqli("localhost", "root", "", "usuarios");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Preparar e executar a query para excluir o documento
$sql = "DELETE FROM files WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// Redirecionar de volta para a página principal após a exclusão
header("Location: documento.php");
exit();
?>
