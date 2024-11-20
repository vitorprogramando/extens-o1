<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: ../login.html"); // Redireciona para a tela de login se o usuário não estiver logado
  exit();
}
?>
<?php
// Evita qualquer saída antes dos cabeçalhos
ob_start();

// Configurações do cabeçalho para o PDF

header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=recibo.pdf");
header("Pragma: no-cache");
header("Expires: 0");

// Obter o código do recibo
$codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar os dados do recibo
if ($codigo) {
    $sql = "SELECT * FROM recibos WHERE codigo = '$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Função para gerar conteúdo PDF básico
        function pdfHeader() {
            return "%PDF-1.4\n";
        }

        function pdfBody($row) {
            $content = "1 0 obj\n";
            $content .= "<< /Type /Catalog\n";
            $content .= "   /Pages 2 0 R\n";
            $content .= ">>\n";
            $content .= "endobj\n";
            $content .= "2 0 obj\n";
            $content .= "<< /Type /Pages\n";
            $content .= "   /Kids [3 0 R]\n";
            $content .= "   /Count 1\n";
            $content .= ">>\n";
            $content .= "endobj\n";
            $content .= "3 0 obj\n";
            $content .= "<< /Type /Page\n";
            $content .= "   /Parent 2 0 R\n";
            $content .= "   /MediaBox [0 0 612 792]\n";
            $content .= "   /Contents 4 0 R\n";
            $content .= ">>\n";
            $content .= "endobj\n";
            $content .= "4 0 obj\n";
            $content .= "<< /Length 300 >>\n"; // Ajustar o tamanho conforme o conteúdo aumenta
            $content .= "stream\n";
            
            // Adicionando a foto da empresa (Exemplo: foto.png no mesmo diretório)
            $imageFilePath = 'img/imobiliaria.jpg';
            if (file_exists($imageFilePath)) {
                $imageData = file_get_contents($imageFilePath);
                $content .= "q\n";
                $content .= "100 0 0 100 50 600 cm /Im1 Do\n"; // Definir as dimensões e a posição da imagem
                $content .= "Q\n";
            }

            $content .= "BT\n";
            $content .= "/F1 12 Tf\n";
            $content .= "50 750 Td\n";
            $content .= "(Recibo Gerado) Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "/F1 12 Tf\n";
            $content .= "50 750 Td\n";
            $content .= "(Recibo Gerado) Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 700 Td\n";
            $content .= "(Codigo: " . htmlspecialchars($row['codigo']) . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 610 Td\n";
            $content .= "(Empresa: " . htmlspecialchars($row['empresa']) . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 580 Td\n";
            $content .= "(CNPJ: 35.611.059/0001-09) Tj\n"; // Substitua pelo CNPJ real
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 550 Td\n";
            $content .= "(Nome do Cliente: " . htmlspecialchars($row['nome_cliente']) . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 520 Td\n";
            $content .= "(CRECI: 2104-F) Tj\n"; // Adicionar CRECI do cliente
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 490 Td\n";
            $content .= "(Valor: R$ " . number_format($row['valor'], 2, ',', '.') . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 460 Td\n";
            $content .= "(Referente: " . htmlspecialchars($row['referente']) . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 430 Td\n";
            $content .= "(Forma de Pagamento: " . htmlspecialchars($row['forma_pagamento']) . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 400 Td\n";
            $content .= "(Parcelas: " . htmlspecialchars($row['parcelas']) . ") Tj\n";
            $content .= "ET\n";
            $content .= "BT\n";
            $content .= "50 370 Td\n";
            $content .= "(Data: " . htmlspecialchars($row['data']) . ") Tj\n";
            $content .= "ET\n";
            
            // Adicionando o aviso
            $content .= "BT\n";
            $content .= "50 220 Td\n";
            $content .= "(Aviso: Este recibo nao quita debitos anteriores.) Tj\n";
            $content .= "ET\n";
             // Negrito 1
             $content .= "BT\n";
             $content .= "50 220 Td\n";
             $content .= "(Aviso:) Tj\n";
             $content .= "ET\n";
            
            $content .= "endstream\n";
            $content .= "endobj\n";
            
            // Definir a imagem (se existir)
            if (file_exists($imageFilePath)) {
                $content .= "6 0 obj\n";
                $content .= "<< /Type /XObject /Subtype /Image /Width 100 /Height 100 /ColorSpace /DeviceRGB /BitsPerComponent 8 /Filter /DCTDecode /Length " . strlen($imageData) . " >>\n";
                $content .= "stream\n";
                $content .= $imageData;
                $content .= "\nendstream\n";
                $content .= "endobj\n";
            }

            $content .= "5 0 obj\n";
            $content .= "<< /Type /Font\n";
            $content .= "   /Subtype /Type1\n";
            $content .= "   /Name /F1\n";
            $content .= "   /BaseFont /Helvetica\n";
            $content .= ">>\n";
            $content .= "endobj\n";
            $content .= "xref\n";
            $content .= "0 7\n"; // Atualizar conforme o número de objetos aumenta
            $content .= "0000000000 65535 f \n";
            $content .= "0000000009 00000 n \n";
            $content .= "0000000074 00000 n \n";
            $content .= "0000000140 00000 n \n";
            $content .= "0000000300 00000 n \n";
            $content .= "0000000490 00000 n \n";
            $content .= "0000000600 00000 n \n"; // Atualizar offset da imagem
            $content .= "trailer\n";
            $content .= "<< /Root 1 0 R\n";
            $content .= "   /Size 7\n"; // Atualizar o tamanho conforme o número de objetos
            $content .= ">>\n";
            $content .= "startxref\n";
            $content .= "700\n"; // Atualizar o valor do startxref
            $content .= "%%EOF\n";
            return $content;
        }

        // Gerar e exibir o PDF
        echo pdfHeader();
        echo pdfBody($row);

    } else {
        echo 'Recibo não encontrado.';
    }
} else {
    echo 'Código do recibo não fornecido.';
}

$conn->close();
?>
