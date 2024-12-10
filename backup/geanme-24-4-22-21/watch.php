<?php
// Obtém o valor do parâmetro "v" da URL
$id = $_GET["v"];

// URL do endpoint oEmbed do YouTube com o ID do vídeo
$url = "https://www.youtube.com/oembed/?url=https://www.youtube.com/watch?v=" . $id;

// Realiza a requisição GET para o endpoint
$response = file_get_contents($url);

// Verifica se a requisição foi bem-sucedida
if ($response === false) {
    die('<html><head></head><body><h1>O vídeo não foi encontrado!</h1></body></html>');
}

// Decodifica o JSON retornado em um array associativo
$data = json_decode($response, true);

// Verifica se o JSON foi decodificado com sucesso
if ($data === null) {
    die('<html><head></head><body><h1>Erro ao decodificar o vídeo.</h1></body></html>');
}

// Obtém o título e o nome do autor do vídeo
$title = $data['title'];
$authorName = $data['author_name'];

// Exibe os dados obtidos
// echo 'Título: ' . $title . '<br>';
// echo 'Nome do Autor: ' . $authorName . '<br>';
?>
<?php

// URL do vídeo do YouTube
$videoUrl = "https://www.youtube.com/watch?v=" . $id;

// Obtém o conteúdo HTML da página do vídeo
$html = file_get_contents($videoUrl);

// Verifica se o conteúdo foi obtido com sucesso
if ($html === false) {
    die('Erro ao obter conteúdo da página do YouTube.');
}

// Expressão regular para extrair o channelId do HTML
$pattern = '/"channelId":"(.*?)"/';

// Executa a expressão regular no HTML para encontrar o channelId
if (preg_match($pattern, $html, $matches)) {
    // O primeiro elemento capturado é o channelId
    $channelId = $matches[1];

    // Exibe o channelId obtido
    // echo 'ID do Canal: ' . $channelId;
} else {
    // Se o channelId não pôde ser encontrado
    // echo 'ID do Canal não encontrado.';
}
?><!--

><(((('>
╔═╗╔═╗╔═╗╔╗╔ ╔╦╗╔═╗
║ ╦║╣ ╠═╣║║║ ║║║║╣ 
╚═╝╚═╝╩ ╩╝╚╝o╩ ╩╚═╝


-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="robots" content="index, follow">
<title>Gean Ramos - <?php echo $title; ?></title>
<meta name="description" content="Assista os melhores vídeos de <?php echo $authorName; ?>. Acesse Agora!" />
<link rel="canonical" href="https://gean.me/watch?v=<?php echo $id; ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $authorName; ?> - Feed" href="https://gean.me/feeds/videos.xml?channel_id=<?php echo $channelId; ?>" />

<!-- Facebook Card -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=5.0,user-scalable=yes">
<meta property="og:site_name" content="Gean Ramos">
<meta property="og:title" content="Gean Ramos - <?php echo $title; ?>">
<meta property="og:description" content="Assista os melhores vídeos de <?php echo $authorName; ?>. Acesse Agora!">
<meta property="og:url" content="https://gean.me/watch?v=<?php echo $id; ?>">
<meta property="fb:pages" content="312914505389872">
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="video.other">
<meta property="og:updated_time" content="<?php echo $pubDate; ?>">
<meta property="og:image" content="https://img.youtube.com/vi_webp/<?php echo $id; ?>/sddefault.webp">
<meta property="og:image:secure_url" content="https://img.youtube.com/vi_webp/<?php echo $id; ?>/sddefault.webp">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1280">
<meta property="og:image:height" content="720">
<meta property="og:video:url" content="https://gean.me/embed/views.php?v=<?php echo $id; ?>">
<meta property="og:video:secure_url" content="https://gean.me/embed/views.php?v=<?php echo $id; ?>">
<meta property="og:video:type" content="text/html">
<meta property="og:video:width" content="1280">
<meta property="og:video:height" content="720">
<meta property="video.other:tag" content="Gean Ramos">
<meta property="video.other:tag" content="<?php echo $authorName; ?>">
<meta property="video.other:tag" content="Vídeo no Youtube">
<meta property="video.other:tag" content="YouTube">
<meta property="video.other:tag" content="Vídeos">
<meta property="video.other:tag" content="<?php echo $title; ?>">
<!-- Twitter Card -->
<meta name="twitter:card" content="player">
<meta name="twitter:site" content="@geanramos">
<meta name="twitter:title" content="Gean Ramos - <?php echo $title; ?>">
<meta name="twitter:description" content="Assista os melhores vídeos de <?php echo $authorName; ?>. Acesse Agora!">
<meta name="twitter:image" content="https://img.youtube.com/vi_webp/<?php echo $id; ?>/sddefault.webp">
<meta name="twitter:player" content="https://gean.me/embed/twitter/<?php echo $id; ?>">
<meta name="twitter:player:width" content="1280">
<meta name="twitter:player:height" content="720">
<meta name="twitter:site" content="@geanramos">

  <link rel="stylesheet" href="https://gean.me/receita/assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="https://gean.me/receita/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/theme/css/style.css?v=1AsV3R">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"></noscript>
  <link rel="preload" as="style" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=1AsV3R">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=1AsV3R" type="text/css">
<style>
    /* Estilos gerais */
    body {
        font-family: 'Poppins', sans-serif;
    }

    .cid-u9p4T2OFvK img,
    .cid-u9p4T2OFvK .item-img,
    div.image-wrapper img {
        width: 100%;
        border-radius: 8px;
    }

    iframe, div.item-img {
        border-radius: 8px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.7);
        overflow: hidden;
        position: relative;
    }

    /* Efeito hover na imagem */
    .item-img img {
        transition: transform 0.3s ease;
    }

    .item-img:hover img {
        transform: scale(1.1); /* Aumenta a escala da imagem em 10% ao passar o mouse */
    }

    /* Estilos para o container */
    .item-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Estilos para o conteúdo dentro do container */
    .item-content {
        padding: 20px;
        background-color: #fff;
    }

    /* Estilos para os links */
    .item-content a {
        color: #007bff; /* Cor do link */
        text-decoration: none; /* Remove sublinhado padrão */
    }

    /* Efeito hover no link */
    .item-content a:hover {
        text-decoration: underline; /* Adiciona sublinhado ao passar o mouse */
    }

    /* Estilos para botões secundários */
    .btn-secondary,
    .btn-secondary:active {
        background-color: #009d43 !important;
        border-color: #009d43 !important;
        color: #ffffff !important;
    }

    /* Estilos para textos primários */
    .text-primary {
        color: #000000 !important;
    }
    .mini {
    text-transform: lowercase;
}
</style>

</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-u9pQbhNXYj" once="menu" id="menu2-k">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#features4-n">
                        <img src="https://i1.wp.com/logodownload.org/wp-content/uploads/2014/10/youtube-logo-0.png?resize=302,100" alt="<?php echo $authorName; ?>" style="height: 3rem;">
                    </a>
                </span>
                
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#features4-n">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./channel/<?php echo $channelId; ?>" alt="Canal de <?php echo $authorName; ?>" title="Canal de <?php echo $authorName; ?>">Canal</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./receita/especial/index.html">Receitas</a>
                    </li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-twitter socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>
                    
                </div>
                <div class="navbar-buttons mbr-section-btn">
				<a class="btn btn-secondary display-4" href="https://go.hotmart.com/A1939024g?src=gean|watch|navbarbuttons|<?php echo $id; ?>" target="_blank"><span class="mobi-mbri mobi-mbri-share mbr-iconfont mbr-iconfont-btn"></span>E-books Premium</a></div>
            </div>
        </div>
    </nav>
</section>


<section data-bs-version="5.1" class="video5 cid-u9pRtVKEQS" id="video5-q">
<div class="container">
        <div class="title-wrapper mb-5">
            
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 video-block">
                <div class="video-wrapper"><iframe class="mbr-embedded-video" src="https://gean.me/embed/yt.php?v=<?php echo $id; ?>" width="560" height="315" frameborder="0" allowfullscreen></iframe></div>
                
                <p class="mbr-description pt-2 mbr-fonts-style display-4"><?php echo $authorName; ?></p>
            </div>
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h6 class="card-title mbr-fonts-style display-2 mini"><strong><?php echo $title; ?></strong></h6>
                    <p class="mbr-text mbr-fonts-style mb-4 display-4 mini">.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features4 cid-u9pQbjaghj" id="features4-n">
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong><?php echo $authorName; ?></strong></h4>
            <h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">Os melhores vídeos de <?php echo $authorName; ?>, Assista Agora!</h5>
        </div>
        <div class="row mt-4">
<?php
// URL do feed XML do YouTube
$feedUrl = "https://www.youtube.com/feeds/videos.xml?channel_id=" . $channelId;

// Obtém o conteúdo do feed XML
$xml = file_get_contents($feedUrl);

// Verifica se o conteúdo foi obtido com sucesso
if ($xml === false) {
    die('Erro ao obter o feed do YouTube.');
}

// Carrega o conteúdo XML como um objeto SimpleXML
$sxml = simplexml_load_string($xml);

// Verifica se o XML foi carregado com sucesso
if ($sxml === false) {
    die('Erro ao analisar o feed XML.');
}

// Array para armazenar as informações extraídas
$videos = [];

// Processa as entradas (máximo de 15 entradas)
$count = 0;
foreach ($sxml->entry as $entry) {
    if ($count >= 15) {
        break;
    }

    // Extrai as informações desejadas de cada entrada
    $videoId = (string) $entry->children('yt', true)->videoId;
    $channelId = (string) $entry->yt->channelId;
    $title = (string) $entry->title;
    $authorName = (string) $entry->author->name;
    $published = (string) $entry->published;
    $updated = (string) $entry->updated;
    $description = (string) $entry->children('media', true)->group->description;
    $views = (int) $entry->children('media', true)->group->community->statistics->attributes()['views'];

    // Armazena as informações em um array associativo
    $videos[] = [
        'videoId' => $videoId,
        'channelId' => $channelId,
        'title' => $title,
        'authorName' => $authorName,
        'published' => $published,
        'updated' => $updated,
        'description' => $description,
        'views' => $views
    ];

    $count++;
}

// Exibe as informações dos vídeos

foreach ($videos as $video) {
    // echo 'ID do Vídeo: ' . $video['videoId'] . '<br>';
    // echo 'ID do Canal: ' . $video['channelId'] . '<br>';
    // echo 'Título: ' . $video['title'] . '<br>';
    // echo 'Nome do Autor: ' . $video['authorName'] . '<br>';
    // echo 'Publicado em: ' . $video['published'] . '<br>';
    // echo 'Atualizado em: ' . $video['updated'] . '<br>';
    // echo 'Descrição: ' . $video['description'] . '<br>';
    // echo 'Visualizações: ' . $video['views'] . '<br>';
    // echo '<br>';
	
    echo '<div class="item features-image ?ol-12 col-md-6 col-lg-4">';
    echo '<div class="item-wrapper">';
    echo '<div class="item-img">';
    echo '<a href="./watch?v=' . $video['videoId'] . '"><img src="https://img.youtube.com/vi_webp/' . $video['videoId'] . '/mqdefault.webp" alt="' . $video['title'] . '" title="' . $video['title'] . '"></a>';
    echo '</div>';
    echo '<div class="item-content">';
    // echo '<h5 class="item-title mbr-fonts-style display-5"><strong>' . $video['published'] . '</strong></h5>';
    echo '<h6 class="item-subtitle mbr-fonts-style mt-1 display-7">' . $video['views'] . ' Views</h6>';
    echo '<p class="mbr-text mbr-fonts-style mt-3 display-7"><a href="./watch?v=' . $video['videoId'] . '" class="text-primary mini">' . $video['title'] . '</a></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>		

            <!--<div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="index.html#top"><img src="assets/images/product1.jpeg" alt="titulo do video" title="titulo do video"></a>
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5"><strong>Branding</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">Creating Your Brand</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">You don't have to code to create your own site. Select one of available themes in the Mobirise Site Maker.<br></p>
                    </div>
                    
                </div>
            </div>-->
        </div>
    </div>
</section>
<section data-bs-version="5.1" class="footer3 cid-u9pQbjSr6D" once="footers" id="footer3-o">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
				<li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#" target="_blank">Sobre</a></li>
				<li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#" target="_blank">Receitas</a></li>
				<li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#" target="_blank">E-books</a></li>
				</ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                <div class="soc-item">
                        <a href="https://twitter.com/" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">© 2004 - 2024 Gean Ramos.</p>
            </div>
        </div>
    </div>
</section>
<script src="https://geanramos.com/cdn/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://geanramos.com/cdn/assets/smoothscroll/smooth-scroll.js"></script>
<script src="https://geanramos.com/cdn/assets/ytplayer/index.js"></script>
<script src="https://geanramos.com/cdn/assets/dropdown/js/navbar-dropdown.js"></script>
<script src="https://geanramos.com/cdn/assets/playervimeo/vimeo_player.js"></script>
<script src="https://geanramos.com/cdn/assets/theme/js/script.js"></script>  
</body>
</html>