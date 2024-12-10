<?php
$url = "https://www.youtube.com/feeds/videos.xml?channel_id=UC43nsQHUiTT2na67yM796HQ";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curl);
curl_close($curl);

if ($content === false) {
    echo "Falha ao obter o conteúdo da URL.";
} else {
    $content = preg_replace("/www\.youtube\.com/", "gean.me", $content);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Conteúdo XML</title>
</head>
<body>
    <pre><?php echo htmlspecialchars($content); ?></pre>
</body>
</html>
