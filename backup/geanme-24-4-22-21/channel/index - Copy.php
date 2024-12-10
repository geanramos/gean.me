<!DOCTYPE html>
<!-- //images.weserv.nl/?url=i4.ytimg.com/vi/id/hqdefault.jpg&w=320&h=180&output=jpg&q=90&t=square -->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $url = $_GET["c"];
    $curl = curl_init("https://www.youtube.com/feeds/videos.xml?channel_id=" . $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($curl);
    curl_close($curl);
    if ($content === false) {
        echo "Falha ao obter o conteúdo da URL.";
        exit;
    }
    $xml = simplexml_load_string($content);
    $author = (string)$xml->author->name;
	$dataAtual = date("Y-m-d");
    ?>
<title><?php echo $author; ?> | Gean Ramos</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
<link rel="alternate" type="application/rss+xml" title="<?php echo $author; ?> - Feed" href="https://gean.me/feeds/videos.xml?channel_id=<?php echo $url; ?>" />
<link rel="shortcut icon" href="https://www.youtube.com/s/desktop/af4cfc59/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="https://www.youtube.com/s/desktop/af4cfc59/img/favicon_32x32.png" sizes="32x32">
<link rel="icon" href="https://www.youtube.com/s/desktop/af4cfc59/img/favicon_48x48.png" sizes="48x48">
<link rel="icon" href="https://www.youtube.com/s/desktop/af4cfc59/img/favicon_96x96.png" sizes="96x96">
<link rel="icon" href="https://www.youtube.com/s/desktop/af4cfc59/img/favicon_144x144.png" sizes="144x144">

<meta itemprop="name" content="<?php echo $author; ?> | Gean Ramos" />
<meta itemprop="description" content="Os melhores vídeos de <?php echo $author; ?>. Assista Agora!" />
<meta itemprop="image" content="https://i.imgur.com/E7IvML6.jpeg" />

<meta name="description" content="Os melhores vídeos de <?php echo $author; ?>. Assista Agora!" />
<link rel="canonical" href="https://gean.me/channel/<?php echo $url; ?>" />
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $author; ?> | Gean Ramos" />
<meta property="og:description" content="Os melhores vídeos de <?php echo $author; ?>. Assista Agora!" />
<meta property="og:url" content="https://gean.me/channel/<?php echo $url; ?>" />
<meta property="og:site_name" content="Gean Ramos - Vídeos" />
<meta property="article:publisher" content="https://www.facebook.com/geanramoss" />
<meta property="article:published_time" content="2023-06-20T12:00:11+00:00" />
<meta property="article:modified_time" content="<?php echo $dataAtual; ?>T00:01:22+00:00" />
<meta property="og:image" content="https://i.imgur.com/E7IvML6.jpeg" />
<meta property="og:image:width" content="1000" />
<meta property="og:image:height" content="667" />
<meta property="og:image:type" content="image/png" />
<meta name="author" content="Gean Ramos" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:creator" content="@geanramos" />
<meta name="twitter:label1" content="Publicado por" />
<meta name="twitter:data1" content="<?php echo $author; ?>" />
 <style>
 body {
     margin: 0;
     padding: 0;
     font-family: 'Montserrat', sans-serif;
    /* Adicionado uma fonte de fallback */
     color: #4d5156;
     background-color: #000;
}
 .container {
     max-width: 320px;
    /* Aumentado o valor para melhor visualização em telas maiores */
     margin: 0 auto;
     padding: 20px;
}
 .video-list {
     list-style-type: none;
     margin: 0;
     padding: 0;
}
 .video-list li {
     margin-bottom: 20px;
}
 .video-list img {
     display: block;
     max-width: 100%;
     height: auto;
     margin-bottom: 10px;
     border-radius: 5px;
}
 .video-list h2 {
     font-size: 18px;
     margin: 0;
     text-transform: lowercase;
    /* Corrigido o valor de text-transform */
}
 .video-list p {
     font-size: 12px;
     margin: 0;
}
 .title {
     font-size: 24px;
     text-transform: uppercase;
     text-align: center;
     margin-top: 20px;
     margin-bottom: 10px;
}
 footer {
     background-color: #f2f2f2;
     width: 100%;
     height: 40px;
     text-align: center;
     line-height: 40px;
	 font-weight: bold;
}
a {
    text-decoration: auto;
    color: #4d5156;
}
 </style>
</head>
<body>
    <h1 class="title"><a href="https://gean.me/channel/<?php echo $url; ?>"><?php echo $author; ?></a></h1>
    <div class="container">
        <?php
        $rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/"></rss>');
        $channel = $rss->addChild('channel');
        $channel->addChild('title', $xml->title);
        $channel->addChild('description', $author); // Adiciona a tag <description>
        $html = '<ul class="video-list">';
        foreach ($xml->entry as $entry) {
            $videoId = $entry->children('yt', true)->videoId;
            $videoUrl = 'https://gean.me/watch?v=' . $videoId;
            $thumbnailUrl = 'https://img.youtube.com/vi/' . $videoId . '/mqdefault.jpg';
            $title = $entry->title;
            $description = $entry->children('media', true)->group->description;
            $pubDate = date('d/m/Y', strtotime($entry->updated));
            $html .= '<li>';
            $html .= '<a href="' . $videoUrl . '">';
            $html .= '<img src="' . $thumbnailUrl . '" alt="' . $title . '" width="320" height="180">';
            $html .= '</a>';
            $html .= '<p>Publicado em: ' . $pubDate . '</p>';
            $html .= '<h2>' . $title . '</h2>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        echo $html;
        ?>
    </div>
</body>
    <footer>
        criado por <a href="https://www.instagram.com/geanramus/">@geanramus</a>
    </footer>
</html>
