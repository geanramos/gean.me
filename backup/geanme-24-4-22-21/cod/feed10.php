<?php
$url = $_GET["channel_id"];

$curl = curl_init("https://www.youtube.com/feeds/videos.xml?channel_id=" . $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curl);
curl_close($curl);

if ($content === false) {
    echo "Falha ao obter o conteúdo da URL.";
    exit;
}

$xml = simplexml_load_string($content);

$rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/"></rss>');
$channel = $rss->addChild('channel');

$channel->addChild('title', $xml->title);

foreach ($xml->entry as $entry) {
    $item = $channel->addChild('item');
    $item->addChild('title', $entry->title, 'http://search.yahoo.com/mrss/');
    $item->addChild('link', 'http://gean.me/watch?v=' . $entry->children('yt', true)->videoId);
    $item->addChild('description', $entry->children('media', true)->group->description, 'http://search.yahoo.com/mrss/');
    $item->addChild('pubDate', date('D, d M Y H:i:s O', strtotime($entry->updated)));
    $item->addChild('guid', $entry->children('yt', true)->videoId);

    $thumbnail = $item->addChild('thumbnail', null, 'http://search.yahoo.com/mrss/');
    $thumbnail->addAttribute('url', 'https://i4.ytimg.com/vi/' . $entry->children('yt', true)->videoId . '/hqdefault.jpg');
    $thumbnail->addAttribute('width', '480');
    $thumbnail->addAttribute('height', '360');
}

header('Content-type: application/rss+xml');
echo $rss->asXML();
?>
