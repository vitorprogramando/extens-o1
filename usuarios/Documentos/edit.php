<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "usuarios");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM files WHERE id = $id");
    $file = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $description = $mysqli->real_escape_string($_POST['description']);

    $stmt = $mysqli->prepare("UPDATE files SET description = ? WHERE id = ?");
    $stmt->bind_param("si", $description, $id);
    if ($stmt->execute()) {
        header("Location: documento.php");
        exit();
    } else {
        die("Erro na execução da consulta SQL: " . $stmt->error);
    }

    $stmt->close();
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/imobiliaria.jpg">
    <title>Editar Descrição</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<a href="documento.php">
<input type="button" id="button" value="Voltar"></a>
    <br>
    <br>
    <center>
    <img src="img/center.png" id="foto" height="250px" width="500px">
    <br>
    <br>
    <br>
    <h3>
    <details>
    <summary> Sobre o campo abaixo <ion-icon name="add-circle"></ion-icon></summary>
    <h4><i>Assim que mudar a Descrição, <mark>Clicar em salvar automaticamente retornará para tela de documentos!</i></mark></h4>
    </details>
</h3>
<br>
    <form action="edit.php" method="post">
</h3>
        <input type="hidden" name="id" value="<?= $file['id'] ?>">
        <label for="description">Descrição:</label>
        <br>
        <br>
        <textarea name="description" id="description" required><?= htmlspecialchars($file['description']) ?></textarea>
        <br>
        <button type="submit">Salvar</button>
</center>
    </form>
    <style>

    details{
        color: black;
    }

    button {
    padding: 20px 50px;
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

    #button {
    padding: 20px 50px;
    background-color: #1a398f;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s;
        
    }

    #button:hover {
    background-color: #476ab6;
    }

    textarea{
    width: 50%;
    margin-top: 4px;
    padding: 10px;    
    border: 1px solid #b2b2b2;
        
    -webkit-border-radius: 3px;
    border-radius: 3px;
        
    -webkit-box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
    box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
        
    -webkit-transition: all 0.2s linear;
    transition: all 0.2s linear;
    }

    label{
      font-size: 800;
        
    }
    </style>
      <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
     <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>
