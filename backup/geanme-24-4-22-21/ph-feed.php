<?php
// Definir o fuso horário para obter o deslocamento -0300
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('D, d M Y H:i:s O'); // Formato: Thu, 18 Apr 2024 20:27:30 -0300

// URL do feed RSS
$feedUrl = 'https://pt.pornhub.com/video/webmasterss';

// Realiza uma requisição HTTP GET para obter o conteúdo do feed
$feedXml = file_get_contents($feedUrl);

// Verifica se a requisição foi bem-sucedida
if ($feedXml === false) {
    die('Erro ao obter o conteúdo do feed.');
}

// Cria um objeto SimpleXML a partir do XML obtido
$xml = simplexml_load_string($feedXml);

// Verifica se o XML foi carregado corretamente
if ($xml === false) {
    die('Erro ao carregar o XML.');
}

// Início do documento RSS
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
     xmlns:georss="http://www.georss.org/georss"
     xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">
    <channel>
        <title>U1M Hub</title>
        <atom:link href="http://gean.me/ph-feed" rel="self" type="application/rss+xml"/>
        <link>https://gean.me/ph-home.php</link>
        <description>Música, cinema, famosos e televisão pra quem ama diversão</description>
        <lastBuildDate><?php echo $dataAtual; ?></lastBuildDate>
        <language>pt-BR</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>
        <generator>https://wordpress.org/?v=6.4.4</generator>

        <?php
        // Loop sobre os itens (vídeos) no canal do feed
        foreach ($xml->channel->item as $item) {
            // Extrair e formatar os dados do vídeo
            $videoTitle = htmlspecialchars((string)$item->title);

            // Modificar o link do vídeo (substituir parte da URL)
            $videoLink = str_replace('https://pt.pornhub.com/view_video.php?viewkey=', 'https://gean.me/ph-watch?v=', (string)$item->link);
            $videoId = str_replace('https://pt.pornhub.com/view_video.php?viewkey=', '', (string)$item->link);
            $pubDate = (string)$item->pubDate;

            // Extrair a URL da imagem grande (thumb_large) se existir
            $thumbLarge = (string)$item->thumb;

            // Extrair a duração do vídeo em segundos
            $durationSeconds = (int)$item->duration;

            // Converter a duração de segundos para minutos (com duas casas decimais)
            $durationMinutes = round($durationSeconds / 60, 2);

            // Saída do item do feed RSS
            echo '<item>';
            echo '<title>' . $videoTitle . '</title>';
            echo '<link>' . $videoLink . '</link>';
            echo '<dc:creator><![CDATA[U1M Hub]]></dc:creator>';
            echo '<pubDate>' . $pubDate . '</pubDate>';
            echo '<guid isPermaLink="false">https://gean.me/ph-watch.php?v=' . $videoId . '</guid>';
            echo '<description><![CDATA[<a href="https://gean.me/ph-ads.php?v=' . $videoId . '" style="border-radius: 8px; clear: left; float: left; margin-bottom: 1em; margin-right: 1em;" target="_blank"> <img src="' . $thumbLarge . '" style="border-radius: 8px;" width="180" height="135" title="' . $videoTitle . '"> </a> </div> <p><strong>' . $videoTitle . '</strong></p> <strong>Duração:</strong> ' . $durationMinutes . ' minutos<br> <strong>Data de publicação:</strong> ' . $dataAtual . ']]></description>';
            echo '<content:encoded><![CDATA[<a href="https://gean.me/ph-ads.php?v=' . $videoId . '" style="border-radius: 8px; clear: left; float: left; margin-bottom: 1em; margin-right: 1em;" target="_blank"> <img src="' . $thumbLarge . '" style="border-radius: 8px;" width="180" height="135" title="' . $videoTitle . '"> </a> </div> <p><strong>' . $videoTitle . '</strong></p> <strong>Duração:</strong> ' . $durationMinutes . ' minutos<br> <strong>Data de publicação:</strong> ' . $dataAtual . ']]></content:encoded>';

            // Adicionar a tag thumb_large se houver uma URL de imagem grande
            if (!empty($thumbLarge)) {
                //    echo '<thumb_large>' . $thumbLarge . '</thumb_large>';
            }

            echo '</item>';
        }
        ?>

    </channel>
</rss>
