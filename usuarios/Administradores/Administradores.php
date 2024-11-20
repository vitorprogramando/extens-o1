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
  <title>Administradores</title>
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
      <a class="navbar-item-inner flexbox-left">
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
<br>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Variáveis para mensagens
$message = "";

// Função para limpar dados
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Função para inserir usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = clean_input($_POST["username"]);
    $password = clean_input($_POST["password"]);
    $email = clean_input($_POST["email"]);
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Criptografa a senha
    
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Usuário cadastrado com sucesso!";
    } else {
        $message = "Erro ao cadastrar usuário: " . $conn->error;
    }
}

// Função para excluir usuário
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM users WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Usuário excluído com sucesso!";
    } else {
        $message = "Erro ao excluir usuário: " . $conn->error;
    }
}

// Função para atualizar usuário
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = intval($_POST["id"]);
    $username = clean_input($_POST["username"]);
    $email = clean_input($_POST["email"]);
    
    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Usuário atualizado com sucesso!";
    } else {
        $message = "Erro ao atualizar usuário: " . $conn->error;
    }
}

// Consultar a tabela de usuários
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);
?>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            color: black;
            padding: 10px;
            text-align: left;
        }
        th {
            color: white;
            background-color:  #1a398f;
        }
        .message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons.min.css">
<center>
<h3>Cadastros de Administradores <ion-icon name="accessibility-outline"></ion-icon></h3>
<br>
<br>
<br>
<br>
<!-- Mensagem de sucesso ou erro -->
<?php if ($message): ?>
    <div class="<?php echo strpos($message, 'Erro') === false ? 'message' : 'error'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>
<!-- Formulário de Cadastro -->
<form id="register-form" action="administradores.php" method="post">
    <ion-icon name="person-outline"></ion-icon>
    <input type="text" name="username" placeholder="Usuário" required>
    <ion-icon name="key-outline"></ion-icon>
    <input type="password" name="password" placeholder="Senha" required>
    <ion-icon name="mail-outline"></ion-icon>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="register">Cadastrar</button>
</form>
<br>
<br>
<br>
<!-- Tabela de Usuários -->
<h2>Usuários Cadastrados</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
</center>
        <?php
        // Verificar se há resultados
        if ($result->num_rows > 0) {
            // Exibir cada linha de resultados
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>
                    <a href='?action=edit&id=" . $row["id"] . "'>Editar</a> | 
                    <a href='?action=delete&id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum usuário cadastrado.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Se a ação for editar
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT username, email FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
?>
    <!-- Formulário de Edição -->
    <h3>Editar Usuário</h3>
    <form action="administradores.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <button type="submit" name="update">Atualizar</button>
    </form>
<?php
}
?>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>

</body>
</html>

<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>
