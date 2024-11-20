<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?>
<?php
include 'db.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=Clientes.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Cliente', 'Email', 'Telefone', 'Subsidiário', 'Email', 'Telefone', 'Endereço', 'Data inicial', 'Data final', 'Observações'));

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
$conn->close();
exit();
?>
