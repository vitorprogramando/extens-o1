
<?php
include 'db.php';

$id = $_POST['id'] ?? '';
$name1 = $_POST['name1'] ?? '';
$email1 = $_POST['email1'] ?? '';
$phone1 = $_POST['phone1'] ?? '';
$name2 = $_POST['name2'] ?? '';
$email2 = $_POST['email2'] ?? '';
$phone2 = $_POST['phone2'] ?? '';
$address = $_POST['address'] ?? '';
$startDate = $_POST['startDate'] ?? '';
$endDate = $_POST['endDate'] ?? '';
$observations = $_POST['observations'] ?? '';

$sql = "UPDATE clientes SET name=?, email=?, phone=?, name2=?, email2=?, phone2=?, address=?, startDate=?, endDate=?, observations=? WHERE id=?";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param('ssssssssssi', $name1, $email1, $phone1, $name2, $email2, $phone2, $address, $startDate, $endDate, $observations, $id);

if ($stmt->execute()) {
    echo 'Registro atualizado com sucesso';
} else {
    echo 'Erro: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
