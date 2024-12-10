<?php

// URL da pesquisa no Google
$searchUrl = 'https://www.google.com.br/search?q=bolo+site:www.receiteria.com.br';

// Obter o conteúdo HTML da página de pesquisa do Google
$html = file_get_contents($searchUrl);

// Array para armazenar os links e títulos das receitas
$recipes = [];

// Expressão regular para encontrar links para receitas específicas
$pattern = '/<a\s+[^>]*href="([^"]+)"[^>]*class="[^"]*BVG0Nb"[^>]*>(.*?)<\/a>/';
preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);

// Processa cada correspondência encontrada
foreach ($matches as $match) {
    $url = $match[1]; // URL do link
    $title = html_entity_decode(strip_tags($match[2])); // Título da receita

    // Verifica se o URL inicia com o padrão desejado
    if (strpos($url, 'https://www.receiteria.com.br/receita/') === 0) {
        // Adiciona o link e título da receita ao array de receitas
        $recipes[] = ['title' => $title, 'url' => $url];
    }
}

// Imprime os títulos e URLs das receitas encontradas
foreach ($recipes as $recipe) {
    echo "Título: {$recipe['title']}\n";
    echo "URL: {$recipe['url']}\n\n";
}

?>
