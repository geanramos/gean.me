<?php
// URL do arquivo JSON
$json_url = 'https://gean.me/listayt.json';

// Obtém o conteúdo JSON da URL
$json_data = file_get_contents($json_url);

// Decodifica o JSON para um array associativo
$data = json_decode($json_data, true);

// Verifica se 'links' está presente no JSON e não está vazio
if (isset($data['links']) && is_array($data['links']) && !empty($data['links'])) {
    // Pega apenas as primeiras 4 ocorrências
    $links = array_slice($data['links'], 0, 35);

    // Itera sobre os primeiros 35 links
    foreach ($links as $index => $link) {
        // Extrai o 'url' de cada link
        $url = $link['url'];

        // Faz a requisição para obter o conteúdo HTML da URL
        $html = file_get_contents($url);

        // Inicializa as variáveis
        $rssLink = '';
        $ogTitle = '';
        $imageSrc = '';

        // Procura pelo link do RSS
        if (preg_match('/<link.*?type=["\']application\/rss\+xml["\'].*?href=["\'](.*?)["\'].*?>/', $html, $matches)) {
            $rssLink = $matches[1];
        }

        // Procura pelo og:title
        if (preg_match('/<meta.*?property=["\']og:title["\'].*?content=["\'](.*?)["\'].*?>/', $html, $matches)) {
            $ogTitle = $matches[1];
        }

        // Procura pela image_src
        if (preg_match('/<link.*?rel=["\']image_src["\'].*?href=["\'](.*?)["\'].*?>/', $html, $matches)) {
            $imageSrc = $matches[1];
        }

        // Imprime os resultados
        echo "Resultados para link $index:\n";
        echo "Link do RSS: $rssLink\n";
        echo "Título do og:title: $ogTitle\n";
        echo "URL da image_src: $imageSrc\n";
        echo "\n";
    }
} else {
    echo "Nenhuma informação de links encontrada no JSON.\n";
}
?>
