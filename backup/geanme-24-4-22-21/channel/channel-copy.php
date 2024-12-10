<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Página Copiada</title>
</head>
<body>
<?php
// Obtém o valor do parâmetro 'c' da URL
$id = $_GET["c"];

// URL da página a ser copiada
$url = "https://raw.githubusercontent.com/geanramos/files/master/yt2.html?$id";

// Obtém o conteúdo HTML da página
$html = file_get_contents($url);

// Remove todas as tags HTML do conteúdo
$texto_puro = strip_tags($html);

// Exibe o conteúdo em texto puro dentro de uma div
echo '<div>' . $texto_puro . '</div>';
?>
</body>
</html>
