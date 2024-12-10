<?php
// URL da página a ser ocultada
$url = 'https://raw.githubusercontent.com/geanramos/files/master/bebidas.html';

// Função para extrair os links que começam com 'https://gean.me/receita/'
function extrairLinksReceitas($html) {
    $doc = new DOMDocument();
    @$doc->loadHTML($html); // Suprimir erros de análise HTML

    $links = array();
    $elements = $doc->getElementsByTagName('a');
    foreach ($elements as $element) {
        $href = $element->getAttribute('href');
        if (strpos($href, 'https://www.youtube.com/@') === 0) {
            $links[$href] = true; // Usamos um array associativo para garantir links únicos
        }
    }

    return array_keys($links);
}

// Função para buscar a página e extrair os links de receitas
function buscarLinksReceitas($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);
    curl_close($ch);

    if ($html) {
        $links = extrairLinksReceitas($html);
        return $links;
    } else {
        return false;
    }
}

// Executar a busca e mostrar os resultados
$linksReceitas = buscarLinksReceitas($url);

if ($linksReceitas !== false && count($linksReceitas) > 0) {
    echo "<h2>Links de Receitas Encontrados:</h2>";
    echo "<ol>";
    foreach ($linksReceitas as $index => $link) {
        echo "<li><a href='$link'>$link</a></li>";
    }
    echo "</ol>";
} else {
    echo "Não foi possível obter os links de receitas.";
}
?>
