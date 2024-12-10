<?php
// Defina o valor do parâmetro 'p' a partir da query string
$id = isset($_GET["p"]) ? $_GET["p"] : '';

// Verifique se o parâmetro 'p' não está vazio
if (empty($id)) {
    die('Parâmetro "p" não foi fornecido na URL.');
}

// URL da página a ser analisada com o parâmetro 'p' dinâmico
$url = "https://www.receiteria.com.br/receita/{$id}/";

// Obter o conteúdo HTML da página
$html = file_get_contents($url);

// Substituir todas as ocorrências de 'www.receiteria.com.br' por 'gean.me' no HTML
$html = str_replace('https://www.receiteria.com.br/receita/', 'https://gean.me/receita/', $html);
$html = str_replace('https://www.receiteria.com.br/wp-content/uploads/', 'https://gean.me/glbimg/', $html);

// Criar um novo objeto DOMDocument
$dom = new DOMDocument();

// Carregar o HTML no DOMDocument, ignorando erros de análise
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

// Obter o título da página
$title = $dom->getElementsByTagName('title')->item(0)->nodeValue;

// Obter a descrição da página (conteúdo da meta tag description)
$description = '';
$metaTags = $dom->getElementsByTagName('meta');
foreach ($metaTags as $tag) {
    if ($tag->getAttribute('name') === 'description') {
        $description = $tag->getAttribute('content');
        break;
    }
}

// Obter o link canônico da página
$canonicalLink = '';
foreach ($metaTags as $tag) {
    if ($tag->getAttribute('property') === 'og:url') {
        $canonicalLink = $tag->getAttribute('content');
        break;
    }
}

// Obter o URL da imagem (conteúdo da meta tag og:image)
$ogImage = '';
foreach ($metaTags as $tag) {
    if ($tag->getAttribute('property') === 'og:image') {
        $ogImage = $tag->getAttribute('content');
        break;
    }
}

// Obter a data de modificação do artigo (conteúdo da meta tag article:modified_time)
$modifiedTime = '';
foreach ($metaTags as $tag) {
    if ($tag->getAttribute('property') === 'article:modified_time') {
        $modifiedTime = $tag->getAttribute('content');
        break;
    }
}

// Criar um array associativo com as informações obtidas
$infoArray = [
    'title' => $title,
    'description' => $description,
    'canonical_link' => $canonicalLink,
    'image_url' => $ogImage,
    'modified_time' => $modifiedTime
];

// Converter o array associativo em formato JSON
$jsonOutput = json_encode($infoArray, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

// Exibir as informações obtidas em formato JSON
echo $jsonOutput;
?>
