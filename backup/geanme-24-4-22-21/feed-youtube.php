<?php

// Array contendo os URLs dos feeds do YouTube
$feed_urls = [
    'https://www.youtube.com/feeds/videos.xml?channel_id=UCKHasHjyNlIn-UhyfQopeXw',
    'https://www.youtube.com/feeds/videos.xml?channel_id=UCCxyKvvEOL6Xp36kY5dBPTA',
    'https://www.youtube.com/feeds/videos.xml?channel_id=UC43nsQHUiTT2na67yM796HQ'
];

// Função para processar e formatar cada entrada do feed
function format_feed_entry($entry) {
    $videoId = $entry->children('yt', true)->videoId;
    $channelId = $entry->children('yt', true)->channelId;
    $title = htmlspecialchars($entry->title);
    $name = htmlspecialchars($entry->author->name);
    $published = $entry->published;
    $updated = $entry->updated;
    $description = htmlspecialchars($entry->children('media', true)->group->description);
    $statistics = $entry->children('media', true)->group->community->statistics->attributes()->views;

    $xml_output = '<entry>';
    $xml_output .= '<id>yt:video:' . $videoId . '</id>';
    $xml_output .= '<yt:videoId>' . $videoId . '</yt:videoId>';
    $xml_output .= '<yt:channelId>' . $channelId . '</yt:channelId>';
    $xml_output .= '<title>' . $title . '</title>';
    $xml_output .= '<link rel="alternate" href="https://https://gean.me/watch.php?v=' . $videoId . '"/>';
    $xml_output .= '<author><name>' . $name . '</name>';
    $xml_output .= '<uri>https://https://gean.me/channel/' . $channelId . '</uri></author>';
    $xml_output .= '<published>' . $published . '</published>';
    $xml_output .= '<updated>' . $updated . '</updated>';
    $xml_output .= '<media:group><media:title>' . $title . '</media:title>';
    $xml_output .= '<media:content url="https://https://gean.me/v/' . $videoId . '?version=3" type="application/x-shockwave-flash" width="640" height="390"/>';
    $xml_output .= '<media:thumbnail url="https://i2.ytimg.com/vi/' . $videoId . '/mqdefault.jpg" width="480" height="360"/>';
    //$xml_output .= '<media:description>' . $description . '</media:description>';
    $xml_output .= '<media:community><media:statistics views="' . $statistics . '"/></media:community></media:group></entry>';

    return $xml_output;
}

// Inicializar o feed completo
$xml_output = '<?xml version="1.0" encoding="UTF-8"?><feed xmlns="http://www.w3.org/2005/Atom" xmlns:yt="http://www.youtube.com/xml/schemas/2015" xmlns:media="http://search.yahoo.com/mrss/">';

foreach ($feed_urls as $feed_url) {
    // Carregar o feed XML
    $xml = simplexml_load_file($feed_url);

    // Processar cada entrada do feed
    foreach ($xml->entry as $entry) {
        $formatted_entry = format_feed_entry($entry);
        $xml_output .= $formatted_entry;
    }
}

$xml_output .= '</feed>';

// Definir cabeçalhos para indicar que estamos enviando XML
header('Content-Type: application/xml; charset=utf-8');

// Imprimir o feed XML formatado
echo $xml_output;

?>
