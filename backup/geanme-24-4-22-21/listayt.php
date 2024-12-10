<?php
// URL da página que contém a lista de links
$url = 'https://gean.me/listayt.html';

// Função para extrair links e títulos da página HTML
function extrairLinksETitulos($url) {
    $html = file_get_contents($url);

    // Cria um novo documento DOM
    $dom = new DOMDocument();

    // Carrega o HTML da página
    @$dom->loadHTML($html);

    // Cria um array para armazenar os links e títulos
    $links = [];

    // Itera sobre todos os elementos <li> na página
    $listItems = $dom->getElementsByTagName('li');
    foreach ($listItems as $item) {
        // Obtém o elemento <a> dentro de cada <li>
        $anchor = $item->getElementsByTagName('a')->item(0);

        // Extrai o href (URL) e o texto (título) do link
        $url = $anchor->getAttribute('href');
        $title = $anchor->nodeValue;

        // Adiciona o par URL e título ao array de links
        $links[] = [
            'url' => $url,
            'title' => $title
        ];
    }

    return $links;
}

// Extrai os links e títulos da página especificada
$links = extrairLinksETitulos($url);

// Cria um array associativo com a chave 'links' contendo os links extraídos
$data = ['links' => $links];

// Converte o array em formato JSON
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Escreve o JSON em um arquivo chamado 'links.json'
file_put_contents('listayt.json', $jsonData);

echo 'Arquivo JSON gerado com sucesso!';
?>
