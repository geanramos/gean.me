<?php
// Include the Simple HTML DOM Parser library
require 'simple_html_dom.php';

// URL da página com as receitas de cocada
$url = 'https://www.geanramos.com.br/receitas-de-cocada/';

// Função para substituir URLs conforme especificado
function replaceUrl($url) {
    return str_replace('https://www.geanramos.com.br/wp-content/uploads/', 'https://cdn.geanramos.com.br/wp-content/uploads/', $url);
}

// Carrega o conteúdo HTML da URL usando o Simple HTML DOM Parser
$html = file_get_html($url);

// Verifica se o conteúdo HTML foi carregado corretamente
if (!$html) {
    die('Erro ao carregar o conteúdo da página.');
}

// Inicializa um array para armazenar as informações das receitas
$recipes = [];

// Encontra todas as ocorrências da classe 'receita' no HTML
foreach ($html->find('div.receita') as $receita) {
    $recipe = [];

    // Extrai o link da receita da classe 'recipe-head'
    $linkElement = $receita->find('div.recipe-head a', 0);
    $recipe['link'] = str_replace('https://www.geanramos.com.br/', 'https://site.geanramos.com.br/', $linkElement->href);

    // Extrai a imagem da receita da classe 'recipe-head'
    $imgElement = $receita->find('div.recipe-head img', 0);
    $recipe['imagem'] = replaceUrl($imgElement->src);

    // Extrai a descrição da receita da classe 'info'
    $descricaoElement = $receita->find('div.info p', 0);
    $recipe['descricao'] = $descricaoElement->plaintext;

    // Adiciona a receita ao array de receitas
    $recipes[] = $recipe;
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

<?php
// Limpa recursos do Simple HTML DOM Parser
$html->clear();
?>
