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
  <title>Recibo</title>
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
      <p4>Otávio Mendes</p4>
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
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left"  href="../Clientes/clientes.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <span class="link-text">Clientes</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left">
        <div class="navbar-item-inner-icon-wrapper flexbox">
          <ion-icon name="document-text-outline"></ion-icon>
        </div>
        <span class="link-text">Recibo</span>
      </a>
    </li>
    <li class="navbar-item flexbox-left">
      <a class="navbar-item-inner flexbox-left"  href="../Administradores/Administradores.php">
        <div class="navbar-item-inner-icon-wrapper flexbox">
        <ion-icon name="key-outline"></ion-icon>
        </div>
        <span class="link-text">Administradores</span>
      </a>
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
<br>
  <h1>Gerar Recibo <ion-icon name="document-outline"></ion-icon></h1>
  <br>
  <br>
  <br>
<p2><ion-icon name="business-outline"></ion-icon> Empresa:
        <select name="NS" id="option">
            <option value="Imobiliaria Otavio Mendes" selected>Imobiliaria Ótavio Mendes</option>
        </select>
</p2>
        <br>
        <br>
        <br>
        <br>
        <p2><ion-icon name="person-circle-outline"></ion-icon> Recebemos de:
        <input type="text" id="nome" placeholder="Nome do Cliente"></p2>
        <p2><ion-icon name="cash-outline"></ion-icon> Valor R$: 
        <input type="number" step="0.01" id="valor" class="inputValor" placeholder="Digite o valor"></p2>
        <p2><ion-icon name="pie-chart-outline"></ion-icon> Referente a:
        <input type="text" id="referente" placeholder="Digite aqui"></p2>
        <br><br>
        <br>
        <p2><ion-icon name="card-outline"></ion-icon> Forma de pagamento:
        <select name="NS" id="NS">
            <option value="Selecionar" selected>Selecionar forma de pagamento</option>
            <option value="Pix">Pix</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Cartao de Debito">Cartão de Débito</option>
            <option value="Cartao de Credito">Cartão de Crédito</option>
            
        </select>
</p2>
<p2><ion-icon name="duplicate-outline"></ion-icon> Selecionar:
        <select name="vezes" id="vezes">
            <option value="">Parcelas</option>
            <option value="1x no Cartao de Credito">1x no Cartão de Crédito</option>
            <option value="2x no Cartao de Credito">2x no Cartão de Crédito</option>
            <option value="3x no Cartao de Credito">3x no Cartão de Crédito</option>
            <option value="4x no Cartao de Credito">4x no Cartão de Crédito</option>
            <option value="5x no Cartao de Credito">5x no Cartão de Crédito</option>
            <option value="6x no Cartao de Credito">6x no Cartão de Crédito</option>
            <option value="7x no Cartao de Credito">7x no Cartão de Crédito</option>
            <option value="8x no Cartao de Credito">8x no Cartão de Crédito</option>
            <option value="9x no Cartao de Credito">9x no Cartão de Crédito</option>
            <option value="10x no Cartao de Credito">10x no Cartão de Crédito</option>
        </select>
</p2>
        <p2><ion-icon name="calendar-outline"></ion-icon> Data:
        <input type="date" id="data"></p2>
        <br><br>
        <br>
        <br>
        <br>
        <h5><input type="checkbox" onclick="validarInput()" id="checkbox" value="ativar Botão"> Confirmar o valor total do Recibo</h5>
        <button id="meuBotao" disabled onclick="gerarRecibo()">Gerar Solicitação</button>
        <a href="listar_recibos.php"><button>Ver Recibos Salvos</button></a>
    </div>

    <script>
        function gerarRecibo() {
            var empresa = document.getElementById('option').value;
            var nome_cliente = document.getElementById('nome').value;
            var valor = parseFloat(document.getElementById('valor').value).toLocaleString('pt-br', {minimumFractionDigits: 2});
            var referente = document.getElementById('referente').value;
            var forma_pagamento = document.getElementById('NS').value;
            var parcelas = document.getElementById('vezes').value;
            var data = document.getElementById('data').value;

            // Enviar dados para o PHP
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'salvar_recibo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Exibir o alerta após gerar o recibo
                        alert('Recibo gerado com sucesso!');
                        
                        // Gerar recibo e imprimir
                        // Se você tiver elementos para mostrar o recibo, adicione-os aqui.
                        // Por exemplo:
                        // document.getElementById('recibo_option').innerHTML = empresa;
                        // document.getElementById('recibo_nome').innerHTML = nome_cliente;
                        // document.getElementById('recibo_referente').innerHTML = referente;
                        // document.getElementById('recibo_NS').innerHTML = forma_pagamento;
                        // document.getElementById('recibo_vezes').innerHTML = parcelas;
                        // document.getElementById('recibo_valor').innerHTML = valor;
                        // document.getElementById('recibo_data').innerHTML = data;
                        // window.print();
                    } else {
                        alert('Erro ao salvar recibo');
                        console.error('Erro ao salvar recibo');
                    }
                }
            };
            xhr.send('empresa=' + encodeURIComponent(empresa) + 
                     '&nome_cliente=' + encodeURIComponent(nome_cliente) + 
                     '&valor=' + encodeURIComponent(valor) + 
                     '&referente=' + encodeURIComponent(referente) + 
                     '&forma_pagamento=' + encodeURIComponent(forma_pagamento) + 
                     '&parcelas=' + encodeURIComponent(parcelas) + 
                     '&data=' + encodeURIComponent(data));
        }

        function validarInput() {
            var inputs = document.getElementsByClassName('inputValor');
            if (inputs.length > 0) {
                var valorInput = inputs[0].value;
                if (valorInput.trim() === '') {
                    alert('Por favor, insira o valor total antes de executar.');
                } else {
                    alert('Valor total do Recibo: ' + valorInput);
                }
            } else {
                alert('Erro: Input não encontrado.');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const checkbox = document.getElementById('checkbox');
            const meuBotao = document.getElementById('meuBotao');
            checkbox.addEventListener('change', function () {
                meuBotao.disabled = !this.checked;
            });
        });
    </script>
</center>
<!-- partial -->
  <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
</body>
</html>
