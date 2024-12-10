<!DOCTYPE html>
<html>
<head>
    <title>Extrair channel Id do YouTube</title>
</head>
<body>
    <h1>Extrair channel Id do YouTube</h1>

    <?php
    function extractChannelId($videoUrl) {
        $html = file_get_contents($videoUrl);
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        $scriptTags = $dom->getElementsByTagName('script');
        foreach ($scriptTags as $scriptTag) {
            $scriptContent = $scriptTag->nodeValue;
            if (strpos($scriptContent, 'channelId') !== false) {
                $pattern = '/\"channelId\":\"(.*?)\"/';
                preg_match($pattern, $scriptContent, $matches);
                if (isset($matches[1])) {
                    return $matches[1];
                }
            }
        }

        return null;
    }

    // Verifica se o parâmetro 'v' está presente na URL
    if (isset($_GET['v'])) {
        $videoId = $_GET['v'];
        $videoUrl = "https://www.youtube.com/watch?v=$videoId";
        $channelId = extractChannelId($videoUrl);

        if ($channelId) {
            echo "O Id do Canal deste vídeo é <a href=\"https://gean.me/channel/$channelId\">$channelId</a>.<br>
			O FEED do Canal deste vídeo é <a href=\"https://gean.me/feeds/videos.xml?channel_id=$channelId\">$channelId</a>";
        } else {
            echo "Não foi possível extrair o channel Id do vídeo.";
        }
    } else {
        echo "Por favor, forneça o ID do vídeo na URL usando o parâmetro 'v'.";
    }
    ?>

</body>
</html>
