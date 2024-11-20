
<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?><?php
include 'db.php';

$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM clientes WHERE name LIKE '%$search%'";
$result = $conn->query($sql);

$clientes = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

echo json_encode($clientes);

$conn->close();
?>
