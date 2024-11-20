<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "usuarios");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Verifica se o ID do arquivo foi fornecido via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter o arquivo com base no ID
    $sql = "SELECT filename, filedata FROM files WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se encontrou o arquivo
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($filename, $filedata);
        $stmt->fetch();
    } else {
        die("Arquivo não encontrado.");
    }

    // Fecha a declaração preparada
    $stmt->close();
} else {
    die("ID do arquivo não especificado.");
}

// Fecha a conexão com o banco de dados
$mysqli->close();

// Define o cabeçalho para PDF
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename='" . $filename . "'");
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

// Exibe o conteúdo do PDF
echo $filedata;
?>
