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

// Substituir "www.youtube.com" por "gean.me"
$content = str_replace("www.youtube.com", "gean.me", $content);

header('Content-type: application/xml');
echo $content;
?>
