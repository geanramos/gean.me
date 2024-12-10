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
<!DOCTYPE html>
<html  >
<head>
<meta charset="UTF-8">

<title><?php echo $author; ?> | Gean Ramos</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
  
  <link rel="stylesheet" href="https://gean.me/receita/assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="https://gean.me/receita/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=qEpEwn"><link rel="stylesheet" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=qEpEwn" type="text/css">
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

    div.item-img {
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
</style>

</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-u9p4T1ohUd" once="menu" id="menu2-f">
    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#top">
                        <img src="https://i1.wp.com/logodownload.org/wp-content/uploads/2014/10/youtube-logo-0.png?resize=302,100" alt="<?php echo $author; ?>" style="height: 3rem;">
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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#top">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#">Receitas</a>
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
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-secondary display-4" href="#"><span class="mobi-mbri mobi-mbri-share mbr-iconfont mbr-iconfont-btn"></span>E-books Premium</a></div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="features4 cid-u9p4T2OFvK" id="features4-i">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong><?php echo $author; ?></strong></h4>
            <h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">Os melhores vídeos de <?php echo $author; ?>. Assista Agora!</h5>
        </div>
        <div class="row mt-4">
            <?php
$rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/"></rss>');
$channel = $rss->addChild('channel');
$channel->addChild('title', $xml->title);
$channel->addChild('description', $author); // Adiciona a tag <description>
foreach ($xml->entry as $entry) {
    $videoId = $entry->children('yt', true)->videoId;
    $videoUrl = 'https://gean.me/watch?v=' . $videoId;
    $thumbnailUrl = 'https://img.youtube.com/vi_webp/' . $videoId . '/mqdefault.webp';
    $title = $entry->title;
    $description = $entry->children('media', true)->group->description;
    $pubDate = date('d/m/Y', strtotime($entry->updated));
	
    $html .= '<div class="item features-image сol-12 col-md-6 col-lg-3">';
    $html .= '<div class="item-wrapper">';
    $html .= '<div class="item-img">';
    $html .= '<a href="' . $videoUrl . '"><img src="' . $thumbnailUrl . '" alt="' . $title . '" title="' . $title . '"></a>';
    $html .= '</div>';
    $html .= '<div class="item-content">';
	$html .= '<h6 class="item-subtitle mbr-fonts-style mt-1 display-7">' . $pubDate . '</h6>';
    $html .= '<p class="mbr-text mbr-fonts-style mt-3 display-7"><a href="' . $videoUrl . '" class="text-primary">' . $title . '</a></p>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
}
// $html .= '</ul>';
echo $html;
?>
            </div>

        </div>
</section>

<section data-bs-version="5.1" class="footer3 cid-u9p4T3tN19" once="footers" id="footer3-j">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    
                    
                    
                    
                    
                <li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#" target="_blank">Sobre</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#" target="_blank">Receitas</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#" target="_blank">E-books</a></li></ul>
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
                    </div><div class="soc-item">
                        <a href="https://instagram.com/" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © 2004 - 2024 Gean Ramos.
                </p>
            </div>
        </div>
    </div>
</section><script src="https://geanramos.com/cdn/assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="https://geanramos.com/cdn/assets/smoothscroll/smooth-scroll.js"></script>  <script src="https://geanramos.com/cdn/assets/ytplayer/index.js"></script>  <script src="https://geanramos.com/cdn/assets/dropdown/js/navbar-dropdown.js"></script>  <script src="https://geanramos.com/cdn/assets/theme/js/script.js"></script>  
  
  
</body>
</html>