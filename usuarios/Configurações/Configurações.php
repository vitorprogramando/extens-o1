<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}

// backup na pasta correta//
if(isset($_POST['backup'])) {
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = ''; // Sua senha do MySQL
  $db_name = 'usuarios';
  
  // Conectar ao banco de dados
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  
  if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
  }

  // Diretório de backup (altere para o caminho desejado)
  $backupDir = 'C:\\Users\\Vitor\\Downloads'; // Especificar o caminho da pasta

  // Certifique-se de que o diretório existe, se não existir, cria o diretório
  if (!file_exists($backupDir)) {
      mkdir($backupDir, 0777, true); // Permissões para criar o diretório
  }

  // Nome do arquivo de backup com o caminho completo
  $backup_file = $backupDir . '\\backup_' . date('Y-m-d_H-i-s') . '.sql';

  // Abrir o arquivo para gravação
  $handle = fopen($backup_file, 'w+');
  
  // Obter todas as tabelas
  $tables = array();
  $result = $conn->query("SHOW TABLES");
  
  while($row = $result->fetch_row()) {
      $tables[] = $row[0];
  }

  // Para cada tabela, gerar a estrutura e os dados
  foreach($tables as $table) {
      // Obter a estrutura da tabela
      $result = $conn->query("SHOW CREATE TABLE $table");
      $row = $result->fetch_row();
      
      fwrite($handle, "\n\n" . $row[1] . ";\n\n");
      
      // Obter os dados da tabela
      $result = $conn->query("SELECT * FROM $table");
      $num_fields = $result->field_count;

      while($row = $result->fetch_row()) {
          fwrite($handle, "INSERT INTO $table VALUES(");
          for($i = 0; $i < $num_fields; $i++) {
              if (isset($row[$i])) {
                  $row[$i] = addslashes($row[$i]);
                  $row[$i] = str_replace("\n", "\\n", $row[$i]);
                  fwrite($handle, '"' . $row[$i] . '"');
              } else {
                  fwrite($handle, 'NULL');
              }
              if ($i < ($num_fields - 1)) {
                  fwrite($handle, ',');
              }
          }
          fwrite($handle, ");\n");
      }
  }

  // Fechar o arquivo
  fclose($handle);
  $conn->close();
  
  echo "Backup realizado com sucesso! Arquivo salvo em: $backup_file";
}
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta charset="UTF-8">
  <title>Configurações</title>
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
      <a class="navbar-item-inner flexbox-left" href="../Suporte/Suporte.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        <span class="link-text">Suporte</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
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
<main id="main" class="flexbox-col">
  <h3>Exportação de Backup <ion-icon name="save-outline"></ion-icon></h3>
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
  <p>Nessa tela conseguimos efetuar o backup de todo o banco de dados referente ao sistema da imobiliaria Ótavio Mendes, basta clicar em efetuar backup que será feito um backup para segurança dos dados alocados no sistema.
  </p>
</main>
<br>
<form method="post">
    <button type="submit" id="form" name="backup">Fazer Backup</button>
</form>

<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>
