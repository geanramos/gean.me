<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações da Receita</title>
</head>
<body>

<?php

// URL da página de incorporação da receita
$urlEmbed = 'https://www.receiteria.com.br/receita/panqueca-de-frango/embed/';

// Obtenha o conteúdo HTML da página
$htmlEmbed = file_get_contents($urlEmbed);

// Verifique se o conteúdo HTML foi obtido com sucesso
if ($htmlEmbed !== false) {
    // Use preg_match para extrair o título da receita
    preg_match('/<title>(.*?)<\/title>/', $htmlEmbed, $title_matches);
    $title = isset($title_matches[1]) ? $title_matches[1] : 'Título não encontrado';

    // Use preg_match para extrair a URL da imagem da receita
    preg_match('/<img .*? src="(.*?)"/', $htmlEmbed, $image_matches);
    $image_url = isset($image_matches[1]) ? $image_matches[1] : '';

    // Exiba o título e a imagem da receita
    echo "<h1>$title</h1>";
    echo "<img src=\"$image_url\" alt=\"$title\">";
} else {
    // Se houver um erro ao obter o conteúdo HTML, exiba uma mensagem de erro
    echo "<p>Erro ao obter o conteúdo da página.</p>";
}

?>

</body>
</html>
