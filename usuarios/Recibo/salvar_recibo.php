<?php

header('Content-Type: application/json');
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die(json_encode(['error' => 'Conexão falhou: ' . $conn->connect_error]));
}

// Receber dados do POST
$empresa = $_POST['empresa'];
$nome_cliente = $_POST['nome_cliente'];
$valor = $_POST['valor'];
$referente = $_POST['referente'];
$forma_pagamento = $_POST['forma_pagamento'];
$parcelas = $_POST['parcelas'];
$data = $_POST['data'];

// Gerar código único para o recibo
$codigo = uniqid('recibo_', true);

// Inserir dados no banco de dados
$sql = "INSERT INTO recibos (codigo, empresa, nome_cliente, valor, referente, forma_pagamento, parcelas, data) VALUES ('$codigo', '$empresa', '$nome_cliente', '$valor', '$referente', '$forma_pagamento', '$parcelas', '$data')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['codigo' => $codigo]);
} else {
    echo json_encode(['error' => 'Erro ao salvar recibo: ' . $conn->error]);
}

$conn->close();
?>
