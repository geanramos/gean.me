<?php

// Inclui a biblioteca Simple HTML DOM Parser
include_once 'simple_html_dom.php';

// URL do vídeo do YouTube
$url = 'https://www.youtube.com/watch?v=uE3uIHqEjvk';

// Obtém o conteúdo HTML da página
$html = file_get_html($url);

// Inicializa as variáveis para armazenar as informações
$description = '';
$url = '';
$keywords = '';

// Verifica se o HTML foi carregado corretamente
if ($html !== false) {
    // Extrai a descrição do vídeo
    $descriptionMeta = $html->find('meta[name=description]', 0);
    if ($descriptionMeta !== null) {
        $description = $descriptionMeta->content;
    }

    // Extrai o URL do vídeo
    $linkItemprop = $html->find('link[itemprop=url]', 0);
    if ($linkItemprop !== null) {
        $url = $linkItemprop->href;
    }

    // Extrai as palavras-chave do vídeo
    $keywordsMeta = $html->find('meta[name=keywords]', 0);
    if ($keywordsMeta !== null) {
        $keywords = $keywordsMeta->content;
    }

    // Libera a memória
    $html->clear();
    unset($html);
}

// Exibe as informações
echo "Descrição: $description<br>";
echo "URL do Vídeo: $url<br>";
echo "Palavras-chave: $keywords<br>";

?>
