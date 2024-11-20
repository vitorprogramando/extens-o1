
<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Clientes</title>
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
      <a class="navbar-item-inner flexbox" href="..//welcome.php">
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
      <a class="navbar-item-inner flexbox-left" href="../Documentos/documento.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="folder-open-outline"></ion-icon>
        </div>
        <span class="link-text">Documentos</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
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
<center>
<!-- Main -->
<main id="main" class="flexbox-col">
<div class="container">
        <h1 class="fa-solid fa-user-plus">Cadastros dos Clientes <ion-icon name="person-add-outline"></ion-icon></h1>
        <br>
        <br>
        
        <form id="userForm">
    <input type="hidden" id="userId" name="id">
    <label for="name1"> <ion-icon name="person-outline"></ion-icon> Cliente:</label>
    <input type="text" id="name1" title="Digitar" name="name1" placeholder="Nome do Cliente" required>
    <label for="email1"><ion-icon name="mail-outline"></ion-icon> Email:</label>
    <input type="email" id="email1" title="Digitar" name="email1" placeholder="Email do Cliente" required>
    <label for="phone1"><ion-icon name="call-outline"></ion-icon> Telefone:</label>
    <input type="text" id="phone1" title="Digitar" name="phone1" placeholder="Número do Cliente" required><br><br><hr/>
    <label for="name2"><ion-icon name="person-outline"></ion-icon> Subsidiário:</label>
    <input type="text" id="name2" title="Digitar" name="name2" placeholder="Nome do Subsidiário">
    <label for="email2"><ion-icon name="mail-outline"></ion-icon> Email:</label>
    <input type="email" id="email2" title="Digitar" name="email2" placeholder="Email do Subsidiário">
    <label for="phone2"> <ion-icon name="call-outline"></ion-icon> Telefone:</label>
    <input type="text" id="phone2" title="Digitar" name="phone2" placeholder="Número do Subsidiário"><br><br><hr/>
    <label for="address"><ion-icon name="location-outline"></ion-icon> Endereço:</label>
    <input type="text" id="address" title="Digitar" name="address" placeholder="Endereço">
    <label for="startDate"><ion-icon name="calendar-number-outline"></ion-icon> Data Inicial:</label>
    <input type="date" id="startDate" title="Digitar" name="startDate" required>
    <label for="endDate"><ion-icon name="calendar-number-outline"></ion-icon> Data Final:</label>
    <input type="date" id="endDate" title="Digitar" name="endDate"required><br><br>
    <label for="observations"><ion-icon name="notifications-outline"></ion-icon> Observações:</label><br>
    <textarea id="observations" title="Digitar" name="observations" placeholder="Observações"></textarea><br>
    <button type="submit" id="salvar" title="Salvar"> Salvar Cadastro <ion-icon name="bookmark-outline"></ion-icon></button>
</form>
        <h2>Consultar Clientes <ion-icon name="search-outline"></ion-icon></h2>
        <div class="search-container">
            <input type="text" title="Pesquisar" id="search" placeholder="Pesquisar...">
        </div>
        <a href="clientes.php">
    <button id="atualizar" title="Atualizar">Atualizar <ion-icon name="reload-outline"></ion-icon></button></a>
    <button id="exportBtn" title="Exportar">Exportar <ion-icon name="download-outline"></ion-icon></button><br><br>
        <table id="userTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Subsidiário</th>
                    <th>Email Sub</th>
                    <th>Telefone Sub</th>
                    <th>Endereço</th>
                    <th>Data inicial</th>
                    <th>Data final</th>
                    <th>Observações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</center>
    <script src="script.js"></script>
    <script>
        document.getElementById('exportBtn').addEventListener('click', function() {
            window.location.href = 'export.php';
        });
    </script>
</main>
<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>
