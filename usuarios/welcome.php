<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?>
<link rel="icon" href="img/imobiliaria.jpg">
<center>
<?php
// Definir o fuso horário correto para o Brasil
date_default_timezone_set('America/Sao_Paulo');

// Definir o intervalo de horário para o backup automático (formato 24 horas: 'H:i')
$horaInicio = '23:00'; // Início do intervalo
$horaFim = '23:25'; // Fim do intervalo

// Verificar o horário atual
$horaAtual = date('H:i');

// Se o horário atual estiver entre o intervalo definido, faz o backup
if ($horaAtual >= $horaInicio && $horaAtual <= $horaFim) {
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = ''; // sua senha do MySQL
    $dbName = 'usuarios';
    $backupDir = 'C:\\Users\\Vitor\\OneDrive\\Backup'; // Altere para o diretório desejado
    $backupFile = $backupDir . '\\backup_' . date('Y-m-d_H-i-s') . '.sql';

    // Comando para fazer o backup
    $command = "C:\\xampp\\mysql\\bin\\mysqldump --user=$dbUser --password=$dbPass --host=$dbHost $dbName > $backupFile";
    
    // Executar o comando
    system($command);

    echo "Backup realizado com sucesso! Arquivo: $backupFile";
} else {
    echo "Horário atual: $horaAtual. O backup será feito entre 23:00 e 23:25.";
}
?>


</center>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Sistema de Gerenciamento</title>
  <link rel="icon" href="img/imobiliaria.jpg">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Icons+Round'>
</head>
<body>
<!-- partial:index.partial.html -->
<!-- Navbar -->
<nav id="navbar">
  <ul class="navbar-items flexbox-col">
    <li class="navbar-logo flexbox-left">
      <a class="navbar-item-inner flexbox" href="welcome.php">
        <img src="img/imobiliaria.jpg" height="75px" width="90px">
      </a>
      <p3>_</p3>
      <p2>Otávio Mendes</p2>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <span class="link-text">Inicio</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="Documentos/documento.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="folder-open-outline"></ion-icon>
        </div>
        <span class="link-text">Documentos</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="Clientes/clientes.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <span class="link-text">Clientes</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="Recibo/Recibo.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="document-text-outline"></ion-icon>
        </div>
        <span class="link-text">Recibo</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left"> 
      <a class="navbar-item-inner flexbox-left" href="Administradores/Administradores.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
        <ion-icon name="key-outline"></ion-icon>
        </div>
        <span class="link-text">Administradores</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="Suporte/Suporte.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        <span class="link-text">Suporte</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left" href="Configurações/Configurações.php">
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
      <a class="navbar-item-inner flexbox-left"href="logout.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="person-circle-outline"></ion-icon>
        </div>
        <span class="link-text">Sair</span>
      </a>
  </ul>
</nav>
<!-- Main -->
<div class="welcome-container">
<main id="main" class="flexbox-col">
<img src="img/capa.jpg" id="foto" height="250px" width="230px">
<img src="img/center.png" id="capa" height="250px" width="30%">
  <h2>Seja Bem-vindo, <?php echo $_SESSION["username"]; ?>!</h2>
  <p>Esse é o sistema de gerenciamento da imobiliaria Otávio Mendes, esse sistema de gerenciamento foi desenvolvido para otimizar o tempo de trabalho da corretora, gerar recibos, cadastrar clientes e salvar contratos!
  </p>
</div>
</main>
<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<style>
  /* -
-*-~*~-*-*-~*~-*-*-~*~* |
●▬▬▬▬▬▬▬๑۩۩๑▬▬▬▬▬▬▬●
Made by ~
Areal Alien ❥ 雷克斯
●▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬●
──────▄▀▄─────▄▀▄
─────▄█░░▀▀▀▀▀░░█▄
─▄▄──█░░░░░░░░░░░█──▄▄
█▄▄█─█░░▀░░┬░░▀░░█─█▄▄█
-*-~*~-*-*-~*~-*-*-~*~* |
- */
:root {
    --primary: 237, 94%, 81%;
    --background: 266, 16%, 92%;
    --background-secondary: 256, 12%, 12%;
    --background-secondary-dark: 256, 10%, 10%;
    --background-secondary-light: 257, 11%, 16%;
    --text-primary: 0, 0%, 0%;
    /* Colors */
    --black: 0, 0%, 0%;
    --white: 0, 0%, 100%;
    --quite-gray: 0, 0%, 50%;
    --grooble: 10, 28%, 93%;
    /* Sizes */
    --heading-large: 5.6rem;
    --heading-medium: 3.6rem;
    --heading-small: 2.4rem;
    --paragraph: 1.11rem;
    --navbar-buttons: 2.4rem;
    /* misc */
    --transition-main: .175, .685, .32;
    /* Fonts */
    --font-main: "Poppins";
}

/* ===========
    Variabels
   =========== */

/* ===============
    Global Styles
   =============== */

*, *::before, *::after {
    box-sizing: inherit;
}
html, body {
    margin: 0;
    width: 100%;
    color: hsl(var(--text-primary));
    font-family: var(--font-main);
    background-color: white;
    -webkit-font-smoothing: antialiased;
    scroll-behavior: smooth;
    box-sizing: border-box;
}

/* ============
    Typography
   ============ */

/* Headings */
h1, h2, h3, h4, h5, h6 {
    margin: 0;
}
/* Font Size */
h1 {
    font-size: var(--heading-large);
}
h2 {
    font-size: var(--heading-medium);
}
h3 {
    font-size: var(--heading-small);
}
h4 {
    font-size: calc(var(--heading-small) - .2rem);
}
h5 {
    font-size: calc(var(--heading-small) - .4rem);
}
h6 {
    font-size: calc(var(--heading-small) - .6rem);
}
/* Font Weight */
h1, h2 {
    font-weight: 900;
}
h3, h4, h5, h6 {
    font-weight: 800;
}
/* Paragraphs */
p {
    margin: 0;
    font-size: var(--paragraph);
}
/* Links */
a {
    color: hsla(var(--primary), 1);
    font-size: var(--paragraph);
    text-decoration: underline;
}
a:visited {
    color: hsla(var(--primary), .5);
}

/* =========
    Buttons
   ========= */

button {
    padding: .8em 1.2em;
    border: 1px solid hsl(var(--black));
    background-color: hsl(var(--background));
    font-size: var(--paragraph);
    cursor: pointer;
    outline: none;
}
button:focus {
    box-shadow:
            0 0 0 2px hsl(var(--black)),
            0 0 0 3px hsl(var(--white));
    border: 1px solid transparent;
}

/* =======
    Lists
   ======= */

ul, ol {
    margin: 1em 0;
}

/* =======
    Forms
   ======= */

form {
    margin: 0;
}
fieldset {
    margin: 0;
    padding: .5em 0;
    border: none;
}
input {
    padding: .8em 1.2em;
    font-size: var(--paragraph);
    background-color: hsl(var(--grooble));
    border: 2px solid hsl(var(--grooble));
    outline: none;
}
textarea {
    padding: .8em 1.2em;
    font-size: var(--paragraph);
    font-family: var(--font-main);
    background-color: hsl(var(--grooble));
    border: 2px solid hsl(var(--grooble));
    outline: none;
}
input, textarea {
    transition: all .2s ease-in-out;
}
input:hover, input:focus, textarea:hover, textarea:focus {
    box-shadow:
            0 0 0 2px hsl(var(--black)),
            0 0 0 3px hsl(var(--white));
    border: 2px solid transparent;
}
select {
    padding: .8em 1.2em;
    border: 1px solid hsl(var(--black));
    font-size: var(--paragraph);
    outline: none;
}

/* =========
    Classes
   ========= */

/* ================
    Global classes
   ================ */

/* =========
    Flexbox
   ========= */

.flexbox {
    display: flex;
    justify-content: center;
    align-items: center;
}
.flexbox-left {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.flexbox-right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
/* Columns */
.flexbox-col {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.flexbox-col-left {
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    align-items: flex-start;
}
.flexbox-col-left-ns {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: flex-start;
}
.flexbox-col-right {
    display: flex;
    justify-content: flex-end;
    flex-direction: column;
    align-items: flex-end;
}
.flexbox-col-start-center {
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    align-items: center;
}
/* Spacings */
.flexbox-space-bet {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* =========
    Classes
   ========= */

.view-width {
    width: 70%;
}

/* ========
    Navbar
   ======== */

#navbar {
    top: 0;
    padding: 0;
    width: 5em;
    height: 100vh;
    position: fixed;
    background-color: hsl(var(--background-secondary));
    transition: width .35s cubic-bezier(var(--transition-main), 1);
    overflow-y: auto;
    overflow-x: hidden;
}
#navbar:hover {
    width: 16em;
}
#navbar::-webkit-scrollbar-track {
    background-color: hsl(var(--background-secondary));
}
#navbar::-webkit-scrollbar {
    width: 8px;
    background-color: hsl(var(--background-secondary));
}
#navbar::-webkit-scrollbar-thumb {
    background-color: hsl(var(--primary));
}
.navbar-items {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
/* Navbar Logo */
.navbar-logo {
    margin: 0 0 2em 0;
    width: 100%;
    height: 5em;
    background: hsl(var(--background-secondary-dark));
}
.navbar-logo > .navbar-item-inner {
    width: calc(5rem - 8px);
}
.navbar-logo > .navbar-item-inner:hover {
    background-color: transparent;
}
.navbar-logo > .navbar-item-inner > svg {
    height: 2em;
    fill: hsl(var(--white));
}
/* Navbar Items */
.navbar-item {
    padding: 0 .5em;
    width: 100%;
    cursor: pointer;
}
.navbar-item-inner {
    padding: 1em 0;
    width: 100%;
    position: relative;
    color: hsl(var(--quite-gray));
    border-radius: .25em;
    text-decoration: none;
    transition: all .2s cubic-bezier(var(--transition-main), 1);
}
.navbar-item-inner:hover {
    color: hsl(var(--white));
    background: hsl(var(--background-secondary-light));
    box-shadow: 0 17px 30px -10px hsla(var(--black), .25);
}
.navbar-item-inner-icon-wrapper {
    width: calc(5rem - 1em - 8px);
    position: relative;
}
.navbar-item-inner-icon-wrapper ion-icon {
    position: absolute;
    font-size: calc(var(--navbar-buttons) - 1rem);
}
.link-text {
    margin: 0;
    width: 0;
    text-overflow: ellipsis;
    white-space: nowrap;
    transition: all .35s cubic-bezier(var(--transition-main), 1);
    overflow: hidden;
    opacity: 0;
}
#navbar:hover .link-text {
    width: calc(100% - calc(5rem - 8px));
    opacity: 1;
}

/* ======
    Main
   ====== */

#main {
    margin: 0 0 0 5em;
    min-height: 150vh;
}
#main > h2 {
    width: 80%;
    max-width: 80%;
}
#main > p {
    width: 80%;
    max-width: 80%;
}

/* =============
    ::Selectors
   ============= */

/* Selection */
::selection {
    color: hsl(var(--white));
    background: hsla(var(--primary), .33);
}
/* Scrollbar */
::-webkit-scrollbar-track {
    background-color: hsl(var(--background));
}
::-webkit-scrollbar {
    width: 8px;
    background-color: hsl(var(--background));
}
::-webkit-scrollbar-thumb {
    background-color: hsl(var(--primary));
}

/* ===============
    5. @keyframes
   =============== */

/* ==============
    @media rules
   ============== */

@media only screen and (max-width: 1660px) {
    :root {
        /* Sizes */
        --heading-large: 5.4rem;
        --heading-medium: 3.4rem;
        --heading-small: 2.2rem;
    }
}
@media only screen and (max-width: 1456px) {
    :root {
        /* Sizes */
        --heading-large: 5.2rem;
        --heading-medium: 3.2rem;
        --heading-small: 2rem;
    }
    .view-width {
        width: 80%;
    }
}
@media only screen and (max-width: 1220px) {
    .view-width {
        width: 70%;
    }
}
@media only screen and (max-width: 1024px) {
    :root {
        /* Sizes */
        --heading-large: 5rem;
        --heading-medium: 3rem;
        --heading-small: 1.8rem;
    }
    .view-width {
        width: 75%;
    }
}
@media only screen and (max-width: 756px) {
    :root {
        /* Sizes */
        --heading-large: 4rem;
        --heading-medium: 2.6rem;
        --heading-small: 1.6rem;
        --paragraph: 1rem;
        --navbar-buttons: 2.2rem;
    }
    .view-width {
        width: calc(100% - 5em);
    }
}
@media only screen and (max-width: 576px) {
    .view-width {
        width: calc(100% - 3em);
    }
}
@media only screen and (max-width: 496px) {

}
p2{
    
    color: aliceblue;
}
p3{
    
    color: rgb(30, 30, 31);
}
img{
    border-radius: 50%;
}
#foto {
  position: absolute;
  top: 55%; /* Posição inicial no topo do container */
  left: 22%; /* Posição inicial à esquerda do container */
  transform: translate(-50%, -50%); /* Centralizar a imagem */
  transition: all 0.5s ease; /* Adicionar transição suave para o movimento */
}

#capa {
  position: absolute;
  top: 20%; /* Posição inicial no topo do container */
  left: 50%; /* Posição inicial à esquerda do container */
  transform: translate(-50%, -50%); /* Centralizar a imagem */
  transition: all 0.5s ease; /* Adicionar transição suave para o movimento */
}

</style>  
</body>
</html>
