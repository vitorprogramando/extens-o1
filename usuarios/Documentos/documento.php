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

$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM files WHERE filename LIKE ? OR description LIKE ? ORDER BY uploaded_at DESC";
$stmt = $mysqli->prepare($sql);
$searchTerm = '%' . $search . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>
 
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Documentos</title>
  <link rel="icon" href="img/imobiliaria.jpg">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'><link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<!-- Navbar -->
<nav id="navbar">
  <ul class="navbar-items flexbox-col">
    <li class="navbar-logo flexbox-left">
      <a class="navbar-item-inner flexbox" href="../welcome.php">
        <img src="img/imobiliaria.jpg" height="75px" width="90px">
      </a>
      <p3>_</p3>
      <p2>Otávio Mendes</p2>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="../welcome.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <span class="link-text">Inicio</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="folder-open-outline"></ion-icon>
        </div>
        <span class="link-text">Documentos</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="../Clientes/clientes.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <span class="link-text">Clientes</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="../Recibo/Recibo.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="document-text-outline"></ion-icon>
        </div>
        <span class="link-text">Recibo</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="../Administradores/Administradores.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
        <ion-icon name="key-outline"></ion-icon>
        </div>
        <span class="link-text">Administradores</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="../Suporte/Suporte.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        <span class="link-text">Suporte</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="../Configurações/Configurações.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="settings-outline"></ion-icon>
        </div>
        <span class="link-text">Configurações</span>
      </a>
    </li>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left"href="../logout.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="person-circle-outline"></ion-icon>
        </div>
        <span class="link-text">Sair</span>
      </a>
  </ul>
</nav>

<!-- Main -->
<main id="main" class="flexbox-col">
  <h1>Cadastros de Documentos <ion-icon name="documents-outline"></ion-icon></h1>
  <p>Para cadastrar um novo documento segue o botão de cadastro <a href="upload.php"><button type="button" title="Adicionar" id="adicionar">Adicionar novo Documento <ion-icon name="add-outline"></ion-icon></button></a></p>
  <br>
  <br>
  <br>
  <form action="documento.php" method="get">
        <input type="text" id="search" title="Pesquisar" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Pesquisar Documentos...">
        <button type="submit" title="Pesquisar">Pesquisar <ion-icon name="search-outline"></ion-icon></button>
        <a href="documento.php"><button type="button" title="Limpar Filtro">Limpar Filtro <ion-icon name="trash-outline"></ion-icon></button></a>
    </form>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Documento</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['filename']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td>
                    <a href="view.php?id=<?= $row['id'] ?>"><button title="Visualizar"><ion-icon name="eye-outline"></ion-icon></button></a>
                    <a href="edit.php?id=<?= $row['id'] ?>"><button title="Editar"><ion-icon name="create-outline"></ion-icon></button></a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este documento?')">  
                    <button title="Excluir"><ion-icon name="trash-outline"></ion-icon></button></a>
                    <a href="download.php?id=<?= $row['id'] ?>"><button title="Baixar"><ion-icon name="download-outline"></ion-icon></button></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
  <p>
  </p>
</main>
<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>

</body>
</html>
<?php
$stmt->close();
$mysqli->close();
?>
