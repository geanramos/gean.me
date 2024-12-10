<?php
$id = $_GET["v"];
// URL da API oEmbed do YouTube
$url = 'https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=' . $id . '&format=json';

// Obtém o conteúdo JSON da URL
$json_data = file_get_contents($url);

// Decodifica o JSON em um array associativo
$videoData = json_decode($json_data, true);

// Verifica se os dados foram obtidos com sucesso
if ($videoData !== null) {
    // Extrai as informações desejadas
    $title = $videoData['title'];
    $authorName = $videoData['author_name'];
    // $videoUrl = $videoData['html'];
    // $thumbnailUrl = $videoData['thumbnail_url'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="robots" content="index, follow">
  <link rel="shortcut icon" href="https://www.youtube.com/s/desktop/3c5cb7b3/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="https://www.youtube.com/s/desktop/3c5cb7b3/img/favicon_32x32.png" sizes="32x32">
  <link rel="icon" href="https://www.youtube.com/s/desktop/3c5cb7b3/img/favicon_48x48.png" sizes="48x48">
  <link rel="icon" href="https://www.youtube.com/s/desktop/3c5cb7b3/img/favicon_96x96.png" sizes="96x96">
  <link rel="icon" href="https://www.youtube.com/s/desktop/3c5cb7b3/img/favicon_144x144.png" sizes="144x144">

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
<meta property="og:image" content="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg&w=1280&h=720&output=jpg&q=80&t=square">
<meta property="og:image:secure_url" content="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg&w=1280&h=720&output=jpg&q=80&t=square">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1280">
<meta property="og:image:height" content="720">
<meta property="og:video:url" content="https://gean.me/embed/<?php echo $id; ?>">
<meta property="og:video:secure_url" content="https://gean.me/embed/<?php echo $id; ?>">
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
<meta name="twitter:image" content="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg&w=1280&h=720&output=jpg&q=80&t=square">
<meta name="twitter:player" content="https://gean.me/embed/<?php echo $id; ?>">
<meta name="twitter:player:width" content="1280">
<meta name="twitter:player:height" content="720">
<meta name="twitter:site" content="@geanramos">
  

  <link rel="stylesheet" href="https://geanramos.com/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://geanramos.com/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://geanramos.com/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="https://geanramos.com/assets/animatecss/animate.css">
  <link rel="stylesheet" href="https://geanramos.com/assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Zen+Antique:400&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Manrope:200,300,400,500,600,700,800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" as="style" href="https://geanramos.com/assets/mobirise/css/mbr-additional.css?v=240308">
  <link rel="stylesheet" href="https://geanramos.com/assets/mobirise/css/mbr-additional.css?v=240308" type="text/css"> 
  <noscript>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Zen+Antique:400&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manrope:200,300,400,500,600,700,800&display=swap">
  </noscript>  
  
    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Recipe",
  "name": "<?php echo $title; ?> | Gean Ramos",
  "url": "https://gean.me/watch?v=<?php echo $id; ?>",
  "image": {
    "@context": "http://schema.org",
    "@type": "ImageObject",
    "url": "https://i.ytimg.com/vi/<?php echo $id; ?>/hqdefault.jpg"
  },
  "author": {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Gean Ramos"
  },
  "datePublished": "<?php echo $date; ?>",
  "description": "Os melhores vídeo de <?php echo $authorName; ?>. Assista Agora!",
  "aggregateRating": {
    "@type": "AggregateRating",
    "reviewCount": "60",
    "ratingValue": "4.8",
    "ratingCount": "589",
    "bestRating": 5,
    "worstRating": 1
  },
  "keywords": "<?php echo $videoData['author_name']; ?>",
  "totalTime": "PT1H20M",
}
</script>

</head>
<body>
  <section data-bs-version="5.1" class="video02 cid-u6rWgNCcgH" id="top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="mbr-figure col-12 mb-5 col-md-9"><iframe class="mbr-embedded-video" src="https://gean.me/embed/<?php echo $id; ?>" width="1280" height="720" frameborder="0" allowfullscreen></iframe></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 content-text">
        <h4 class="mbr-description mbr-fonts-style mb-3 align-center display-5">
          <strong><?php echo $title; ?></strong>
        </h4>
        <p class="mbr-description mbr-fonts-style mb-0 align-center display-7">
        <!--Unleash your inner artist with our unique products.-->
        </p>
      </div>
    </div>
  </div>
</section><section class="display-7" style="padding: 0;align-items: center;justify-content: center;flex-wrap: wrap;    align-content: center;display: flex;position: relative;height: 4rem;"><p style="margin: 0;text-align: center;" class="display-7">&#8204;</p></section><script src="https://geanramos.com/assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="https://geanramos.com/assets/smoothscroll/smooth-scroll.js"></script>  <script src="https://geanramos.com/assets/ytplayer/index.js"></script>  <script src="https://geanramos.com/assets/playervimeo/vimeo_player.js"></script>  <script src="https://geanramos.com/assets/theme/js/script.js"></script>
  <input name="animation" type="hidden">
  </body>
  	<a class="botaoWhatsapp" target="_blank" href="https://api.whatsapp.com/send?text=<?php echo $title; ?> https://gean.me/watch?v=<?php echo $id; ?>&utm_source=whatsapp"><em></em></a>
	<style>
			.botaoWhatsapp:link,
		.botaoWhatsapp:active,
		.botaoWhatsapp:visited{position: fixed;bottom: 20px;right: 82px;width: 48px;height: 48px;border-radius: 100%;background: #25D366;display: flex;align-items: center;justify-content: center;box-shadow: 0 3px 0 #00000024;z-index: 999;transition: all 0.5s ease;}
			.botaoWhatsapp em{ display: block; background-image: url("https://pudimperfeito.50x.com.br/extra/whatsapp-icon.svg"); width: 25px; height: 26px; background-repeat: no-repeat; background-size: contain; }
		
		.botaoWhatsapp:hover{background: #1ee167; box-shadow: 0 3px 9px 0px #00000024;}
		._320 .botaoWhatsapp{bottom: 86px;right: 20px;width: 48px;height: 48px;border-radius: 100%;}
	
	</style>
</html>