<?php
// URLs dos feeds que deseja unir
$feedUrls = [

    'https://gean.me/feeds/videos.xml?channel_id=UCDRQ2eswxl6usrUE0Sf970g',
    'https://gean.me/feeds/videos.xml?channel_id=UCXdzIVymz0VD3WwhSG4E04Q',
    'https://gean.me/feeds/videos.xml?channel_id=UC4ovz3ObT9fffGjJjVKFGDQ',
    'https://gean.me/feeds/videos.xml?channel_id=UCtKmC6lzaJh-U2I16xRuD4g',
    'https://gean.me/feeds/videos.xml?channel_id=UCNQEgAUxL4P8hdAdQ1L4Zjw',
    'https://gean.me/feeds/videos.xml?channel_id=UCFEocwppOxIvrKiy55D7Sbw'
];

// Função para carregar e processar um feed RSS
function parseFeed($url) {
    $xml = simplexml_load_file($url);
    if ($xml) {
        return $xml->entry;
    } else {
        return [];
    }
}

// Array para armazenar todos os itens de vídeo dos feeds combinados
$combinedItems = [];

// Processa cada feed e coleta os itens de vídeo
foreach ($feedUrls as $feedUrl) {
    $items = parseFeed($feedUrl);
    foreach ($items as $item) {
        $combinedItems[] = $item;
    }
}

// Ordena os itens por data de publicação (do mais recente para o mais antigo)
usort($combinedItems, function($a, $b) {
    return strtotime($b->published) - strtotime($a->published);
});

// Cria um novo feed RSS combinado
$combinedFeed = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel></channel></rss>');

// Adiciona os itens combinados ao novo feed RSS
foreach ($combinedItems as $item) {
    $newItem = $combinedFeed->channel->addChild('item');
    $newItem->addChild('title', htmlspecialchars($item->title));
    $newItem->addChild('link', htmlspecialchars($item->link['href']));
    $newItem->addChild('pubDate', htmlspecialchars($item->published));
    $newItem->addChild('description', htmlspecialchars($item->content));
}

// Define o tipo de conteúdo e imprime o novo feed RSS combinado
header('Content-type: application/rss+xml');
echo $combinedFeed->asXML();
?>
