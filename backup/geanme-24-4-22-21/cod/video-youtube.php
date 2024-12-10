<?php
$id = $_GET["v"];
$url = 'https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=' . $id . '&format=json';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

if ($response === false) {
    echo 'Falha ao obter informações do vídeo.';
    exit;
}

$videoData = json_decode($response, true);

if (empty($videoData)) {
    echo 'Falha ao obter informações do vídeo.';
    exit;
}

$title = $videoData['title'];
$authorName = $videoData['author_name'];
$videoUrl = $videoData['html'];
$thumbnailUrl = $videoData['thumbnail_url'];
?>

<!DOCTYPE html>
<!-- https://wsrv.nl/?url=https://img.youtube.com/vi/k8Aq1zxNoOk/maxresdefault.jpg&w=400&output=webp -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Vídeo</title>
</head>
<body>
    <h2><?php echo $title; ?></h2>
    <p>autor: <?php echo $authorName; ?></p>
    <p>URL: <a href="https://gean.me/yt/<?php echo $id; ?>" target="_blank">https://youtu.be/<?php echo $id; ?></a></p>
    <img src="https://img.youtube.com/vi/<?php echo $id; ?>/maxresdefault.jpg" alt="Thumbnail do vídeo">
</body>
</html>
