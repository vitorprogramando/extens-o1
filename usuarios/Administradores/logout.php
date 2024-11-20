<?php
session_start();
session_unset();
session_destroy();
header("Location: login.html"); // Redireciona para a tela de login após o logout
exit();
?>
