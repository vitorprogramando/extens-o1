<?php
session_start();

// Verifica se o usuário está logado (exemplo simples de controle de acesso)
if (!isset($_SESSION["username"])) {
    header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
    exit();
}

// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "usuarios");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Verifica se o ID do arquivo foi fornecido via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obter o arquivo com base no ID
    $sql = "SELECT filename, description, uploaded_at, filedata FROM files WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se encontrou o arquivo
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($filename, $description, $uploaded_at, $filedata);
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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualização do Documento</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/imobiliaria.jpg">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
</head>
<body>
<a href="documento.php" title="Voltar"><button><ion-icon name="arrow-back-outline"></ion-icon> Voltar</button></a>
    <center>
    <img src="img/center.png" id="foto" height="250px" width="500px">
    <br>
    <br>
    <br>
    <h3>
    <details>
    <summary> Sobre tabela abaixo <ion-icon name="add-circle"></ion-icon></summary>
    <h4><i>Na tabela abaixo temos as descrições do documento, <mark>Clicando em visualizar PDF você consegue visualizar o arquivo sem precisar fazer o download!</i></mark></h4>
    </details>
</h3>
    <hr />
    <br>
    <table id="userTable">
        <thead>
            <td>Nome do Arquivo</td>
            <td>Nome do cliente</td>
            <td>Código do Arquivo</td>
            <tr>
                <th><p><strong>Arquivo:</strong> <?= htmlspecialchars($filename) ?></p></th>
                <th><p><strong>Nome:</strong> <?= htmlspecialchars($description) ?></p></th>
                <th><p><strong>Código</strong> <?= htmlspecialchars($uploaded_at) ?></p></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <!-- Botão para abrir o PDF em nova janela -->
    <a href="view_pdf.php?id=<?= $id ?>" target="_blank"><input type="button" id="button" title="Visualizar" value="Visualizar PDF"></a>
    <br>
    <br>
    <hr />
    <br>
    <br>
    <br>
    <div id="pdf-viewer">
        <!-- Aqui vamos carregar o PDF -->
    </div>
    <br>
    <br>
    </center>
    <style>
    body{
        background-color: WhiteSmoke;
    }
        /* Export Button Styling */
    h1{
    color:;
    font-family: sans-serif;
    font-size: xx-large;
    font-style: italic;
    font-variant: small-caps;
    font-weight: 800;
    }
    
    p{
    color:;
    font-family: sans-serif;
    font-size: large;
    font-style: italic;
    font-variant: small-caps;
    font-weight: 800;
    font-stretch:condensed;
    }
    #button {
        padding: 20px 30px;
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

    table {
    width: 60%;
    border-collapse: collapse;
    color: black;
    }

    table, th, td {
        border: 5px solid #ddd;
        border-color: #B0C4DE;
    }

    th, td {
        padding: 20px;
        text-align: left;
        background-color: #1a398f;
        color: white;
    }

    th {
        background-color: white;
        color: black;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    </style>
     <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
     <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
    <script>
        // URL do PDF Blob gerado pelo PHP
        const pdfUrl = "data:application/pdf;base64,<?= base64_encode($filedata) ?>";

        // Carregar PDF utilizando PDF.js (opcional, para visualização na mesma página)
        pdfjsLib.getDocument({ url: pdfUrl }).promise.then(pdfDoc => {
            const numPages = pdfDoc.numPages;
            const pdfViewer = document.getElementById("pdf-viewer");

            for (let pageNum = 1; pageNum <= numPages; pageNum++) {
                pdfDoc.getPage(pageNum).then(page => {
                    const canvas = document.createElement("canvas");
                    const context = canvas.getContext("2d");
                    const viewport = page.getViewport({ scale: 1.5 });

                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    pdfViewer.appendChild(canvas);

                    page.render(renderContext);
                });
            }
        });
    </script>
</body>
</html>
