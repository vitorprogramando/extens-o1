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
  <title>Suporte</title>
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
      <a class="navbar-item-inner flexbox-left">
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
<br>
<br>
<center>
<h4>Central de suporte <ion-icon name="logo-wechat"></ion-icon></h4>
<br>
</center>
<main id="main" class="flexbox-col">
  <p>Prezado(a) Usuário(a), <ion-icon name="body-outline"></ion-icon><br><br><br>

Estamos à disposição para oferecer toda a assistência necessária para garantir uma experiência tranquila e satisfatória com o nosso sistema.<br><br>

Caso necessite de suporte técnico ou tenha alguma dúvida, sinta-se à vontade para entrar em contato conosco através dos seguintes canais:<br><br><br>
<div class="contact-container">
        <div class="contact-info">
            <img src="img/gmail.webp" alt="E-mail" style="width:50px; height:50px;"/>
            <a href="mailto:creatycode@gmail.com">creatycode@gmail.com</a>
        </div>

        <div class="contact-info">
            <img src="img/phone.png" alt="Telefone" style="width:35px; height:35px;"/>
            <span>Telefone:</span> <a href="tel:83999485660">(83) 99948-5660</a>
        </div>

        <div class="contact-info">
            <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp" style="width:48px; height:48px;"/>
            <span>WhatsApp:</span> <a href="https://wa.me/5583999485660" target="_blank">(83) 99948-5660</a>
        </div>

        <div class="contact-info">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" style="width:48px; height:48px;"/>
            <span>Instagram:</span> <a href="https://www.instagram.com/creatycode" target="_blank">@creatycode</a>
        </div>
    </div>
    <br>
    <br>
<p> Horário de Atendimento:</p><br><br>
<p>Segunda a Sexta-feira, das 9h00 às 18h00.<br><br>
Agradecemos por confiar em nossos serviços. Estamos comprometidos em oferecer a você o melhor suporte possível.<br><br>
Atenciosamente,
<mark>[Creatycode <ion-icon name="logo-codepen"></ion-icon>]</mark></p>
  </p>
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
<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<style>

        .contact-container {
            display: flex;
            flex-wrap: wrap; /* Permite que os itens se movam para a linha seguinte se não houver espaço suficiente */
            gap: 10px; /* Espaçamento entre os itens */
            justify-content: start; /* Alinha os itens no início do contêiner */
        }
        .contact-info {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            flex: 1 1 auto; /* Permite que os itens se ajustem automaticamente */
            max-width: 300px; /* Define uma largura máxima para os itens */
        }
        .contact-info img {
            margin-right: 5px;
            border-radius: 50%;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            margin-left: 5px;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        .contact-info span {
            font-size: 10px;
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</body>
</html>
