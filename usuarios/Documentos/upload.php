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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $mysqli->real_escape_string($_POST['description']);
    $file = $_FILES['file'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Erro no upload do arquivo.");
    }

    $filename = basename($file['name']);
    $filedata = file_get_contents($file['tmp_name']);

    $stmt = $mysqli->prepare("INSERT INTO files (filename, description, filedata) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $filename, $description, $filedata);

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
    <link rel="icon" href="img/imobiliaria.jpg">
    <meta charset="UTF-8">
    <title>Cadastro de Documentos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <br>
    <br>
    <center>
    <img src="img/center.png" id="foto" height="250px" width="500px">
    <h1><i>Cadastrar Documentos</i></h1>
    <form action="upload.php" method="post" id= button enctype="multipart/form-data">
        <label for="file">Arquivo:</label>
        <br>
        <input type="file" name="file" id="file" accept="application/pdf" required>
        <br>
        <br>
        <label for="description">Descrição:</label>
        <br>
        <textarea name="description" id="description" required></textarea>
        <br>
        <br>
        <button type="submit">Salvar <ion-icon name="save-outline"></ion-icon></button> <a href="documento.php"><button type="button">Voltar para tela de cadastro <ion-icon name="return-down-back-outline"></ion-icon></button></a>
    </form>
</center>
    <style>
        textarea{
        width: 20%;
        margin-top: 4px;
        padding: 20px;    
        border: 1px solid #b2b2b2;
        
        -webkit-border-radius: 3px;
        border-radius: 3px;
        
        -webkit-box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
        box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
        
        -webkit-transition: all 0.2s linear;
        transition: all 0.2s linear;
        }
        /* Export Button Styling */
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

        #file{
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
        
    </style>
</body>
</html>
