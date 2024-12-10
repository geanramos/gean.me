<?php
// URL da página a ser copiada
$url = isset($_GET['url']) ? $_GET['url'] : '';
if (empty($url)) {
    die("Erro: URL não fornecida.");
}

// Verifica se a URL é válida
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    die("Erro: URL inválida.");
}

// Constrói a URL completa
$full_url = "https://www.receiteria.com.br/receita/$url";

// Obtenha o conteúdo HTML da página
$html = file_get_contents($full_url);

// Verifique se houve algum erro ao obter o conteúdo HTML
if ($html === false) {
    die("Erro ao obter o conteúdo da página.");
}

// Função para obter o conteúdo entre duas tags
function get_content_between_tags($html, $tag) {
    $pattern = "/<$tag.*?>(.*?)<\/$tag>/si";
    preg_match($pattern, $html, $matches);
    return isset($matches[1]) ? $matches[1] : "";
}

// Obtendo o título, descrição e imagem da página
$title = get_content_between_tags($html, "title");
$description = get_content_between_tags($html, "meta name=\"description\"");
$image = get_content_between_tags($html, "meta property=\"og:image\"");

// Exibindo os resultados
echo "Título: $title <br>";
echo "Descrição: $description <br>";
echo "Imagem: $image <br>";
?>
