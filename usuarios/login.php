<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = $conn->query($sql);
  
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) { // Verifica a senha
      $_SESSION["username"] = $username;
      $_SESSION["username"] = $row["username"]; // Armazena o nome do usuário na sessão
      header("Location: welcome.php"); // Redireciona para a página de boas-vindas após o login
      exit();
    } else {
      echo "Senha incorreta.";
    }
  } else {
    echo "Usuário não encontrado.";
  }
}

$conn->close();
?>
