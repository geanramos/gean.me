<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrair Endereço da Imagem</title>
</head>
<body>

<?php

// Obtenha o ID da imagem a partir da URL
$id = isset($_GET["url"]) ? $_GET["url"] : '';

// Verifique se o ID da imagem foi fornecido
if (!empty($id)) {
    // Construa a URL completa da página usando o ID fornecido
    $urlsite = "https://www.receiteria.com.br/receita/$id/";

    // Use a função file_get_contents para obter o conteúdo da página HTML
    $htmlsite = file_get_contents($urlsite);

    // Use preg_match para extrair o endereço da imagem da meta tag "og:image"
    preg_match('/<meta property="og:image" content="(.*?)" \/>/', $htmlsite, $matches);

    // Verifique se o endereço da imagem foi encontrado
    if (isset($matches[1])) {
        // Exiba a imagem
        echo '<p><img class="post" alt="code" src="' . $matches[1] . '"></p>';
    } else {
        // Se o endereço da imagem não foi encontrado, exiba uma imagem de fallback
        echo '<p><img class="post" alt="frando" src="https://i.imgur.com/QEkgg9S.jpeg"></p>';
    }
}

?>

</body>
</html>
