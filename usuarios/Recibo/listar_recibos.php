<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Variáveis de pesquisa
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Consulta SQL com pesquisa
$sql = "SELECT * FROM recibos WHERE empresa LIKE '%$search%' OR nome_cliente LIKE '%$search%' OR codigo LIKE '%$search%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'><link rel="stylesheet" href="./style.css">
    <title>Lista de Recibos</title>
    <link rel="icon" href="img/imobiliaria.jpg">
    <style>
        table {
    width: 80%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #1a398f;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
button {
    padding: 10px 20px;
    background-color: #1a398f;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s;
    
}

button:hover {
    background-color: #476ab6;
}
h1 {
    font-size: 40px;
    margin-bottom: 20px;
    color: #000000;
    text-align: center;
}
input{
    width: 500px;
    height: 34px;
    border-radius: 5px;
}

h1 {
    font-size: 40px;
    margin-bottom: 20px;
    color: #000000;
    text-align: center;
}

        
    </style>
</head>
<body>
    <center>
        <br>
    <h1>Lista de Recibos <ion-icon name="document-attach-outline"></ion-icon></h1>
    <a href="Recibo.php"><button>Voltar para a Página de Geração de Recibos</button></a>
    <br>
    <br>
    <!-- Formulário de Pesquisa -->
    <form method="GET" action="">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar recibo">
        <button type="submit">Buscar</button>
    </form>
    <p2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Nome do Cliente</th>
                <th>Valor</th>
                <th>Referente</th>
                <th>Forma de Pagamento</th>
                <th>Parcelas</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
    </p2>
        <br>
        <br>
</center>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["empresa"] . "</td>";
                    echo "<td>" . $row["nome_cliente"] . "</td>";
                    echo "<td>R$ " . number_format($row["valor"], 2, ',', '.') . "</td>";
                    echo "<td>" . $row["referente"] . "</td>";
                    echo "<td>" . $row["forma_pagamento"] . "</td>";
                    echo "<td>" . $row["parcelas"] . "</td>";
                    echo "<td>" . $row["data"] . "</td>";
                    echo "<td>
                    <a href='gerar_pdf.php?codigo=" . urlencode($row["codigo"]) . "' target='_blank'><button>Visualizar PDF</button></a> |
                    <a href='gerar_pdf.php?codigo=" . urlencode($row["codigo"]) . "' download='recibo_" . urlencode($row["codigo"]) . ".pdf'><button>Baixar PDF</button></a> |
                    <a href='listar_recibos.php'> <button>Atualizar</button></a>
                </td>
                
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Nenhum recibo encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
