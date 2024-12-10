<?php
// URL da página com as receitas de cocada
$url = 'https://www.receiteria.com.br/receitas-de-cocada/';

// Função para substituir URLs conforme especificado
function replaceUrl($url) {
    return str_replace('https://www.receiteria.com.br/wp-content/uploads/', 'https://gean.me/cdn/400x225/', $url);
}

// Função para obter o conteúdo HTML da URL
function getUrlContent($url) {
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
        ]
    ];
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

// Obter o conteúdo HTML da página
$html = getUrlContent($url);

// Regex para encontrar todas as receitas
$pattern = '/<div class="receita">.*?<a href="(.*?)".*?<img src="(.*?)".*?<p>(.*?)<\/p>/s';
preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);

// Array para armazenar as receitas
$recipes = [];

// Processar os resultados encontrados
foreach ($matches as $match) {
    $link = str_replace('https://www.receiteria.com.br/', 'https://gean.me/', $match[1]);
    $imagem = str_replace('https://www.receiteria.com.br/wp-content/uploads/', 'https://gean.me/cdn/400x225/', $match[2]);
    $descricao = strip_tags($match[3]); // Remover tags HTML da descrição

    // Adicionar a receita ao array
    $recipes[] = [
        'link' => $link,
        'imagem' => $imagem,
        'descricao' => $descricao
    ];
}

// Exibir as receitas em uma página HTML
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Receitas de Cocada</title>
</head>
<body>
    <h1>Receitas de Cocada</h1>
    <?php foreach ($recipes as $recipe): ?>
        <div class="receita">
            <div class="recipe-head">
                <a href="<?php echo $recipe['link']; ?>">
                    <img src="<?php echo $recipe['imagem']; ?>" alt="Imagem da receita">
                </a>
            </div>
            <div class="info">
                <p><?php echo $recipe['descricao']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>
