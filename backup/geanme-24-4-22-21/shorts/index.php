<?php
// Obtém o valor do parâmetro 'v' da URL
$id = $_GET["v"];

// URL da oEmbed API do YouTube
$url = "https://www.youtube.com/oembed/?url=https://www.youtube.com/watch?v=" . $id;

// Obtém o conteúdo JSON da API
$json = file_get_contents($url);

// Decodifica o JSON para um array associativo
$data = json_decode($json, true);

// Verifica se o JSON foi decodificado com sucesso
if ($data) {
    // Verifica se o campo 'title' está presente no array
    if (isset($data['title'])) {
        // Exibe o título da página
        $pageTitle = $data['title'];
    }    
	if (isset($data['author_name'])) {
        // Exibe o autor do video
		$pageAuthor = $data['author_name'];
    }
}
// Obtém a data atual
$dataAtual = date("Y-m-d");
?>
<!--SHORTS PAGE by @GEANRAMUS-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=5.0,user-scalable=yes">
    <title>GEAN RAMOS - <?php echo $pageTitle; ?> | SHORTS</title>
	<meta name="description" content="Assista os melhores vídeos de <?php echo $pageAuthor; ?>. Acesse Agora!">
	<link rel="canonical" href="https://gean.me/watch?v=<?php echo $id; ?>" />
	<meta name="robots" content="max-image-preview:large">
	
  <meta name="msapplication-TileImage" content="https://i1.wp.com/gean.me/shorts/shorts.png?resize=32,32">
  <link rel="apple-touch-icon-precomposed" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=32,32">
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=152,152">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=144,144">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=120,120">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=114,114">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=192,192">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=144,144">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=72,72">
  <link rel="apple-touch-icon-precomposed" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=32,32">
  <link rel="icon" href="https://i1.wp.com/gean.me/shorts/shorts.png?resize=32,32" sizes="32,32">
  <link rel="shortcut icon" href="https://gean.me/shorts/shorts.png" />
  <link rel="icon" sizes="16,16" href="https://gean.me/shorts/shorts.png">
  
<meta property="og:locale" content="pt_BR" />
<meta property="og:site_name" content="Gean Ramos">
<meta property="og:url" content="https://gean.me/watch?v=<?php echo $id; ?>">
<meta property="og:type" content="video.other">
<meta property="og:title" content="GEAN RAMOS - <?php echo $pageTitle; ?> | SHORTS">
<meta property="og:description" content="Assista os melhores vídeos de <?php echo $pageAuthor; ?>. Acesse Agora!">
<meta property="article:published_time" content="2024-03-13T16:53:02+00:00" />
<meta property="article:modified_time" content="<?php echo $dataAtual; ?>T00:01:26+00:00" />
<meta property="og:updated_time" content="<?php echo $dataAtual; ?>T00:02:48+00:00">
<meta property="og:image" content="https://img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg">
<meta property="og:image:secure_url" content="https://img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="720">
<meta property="og:image:height" content="720">
<meta property="og:video:url" content="https://gean.me/embed/<?php echo $id; ?>">
<meta property="og:video:secure_url" content="https://gean.me/embed/<?php echo $id; ?>">
<meta property="og:video:type" content="text/html">
<meta property="og:video:width" content="720">
<meta property="og:video:height" content="720">
<meta property="video.other:tag" content="Gean Ramos">
<meta property="video.other:tag" content="<?php echo $pageAuthor; ?>">
<meta property="video.other:tag" content="<?php echo $pageTitle; ?>">
<meta property="video.other:tag" content="YouTube">
<meta property="video.other:tag" content="Vídeos">
<meta property="video.other:tag" content="Gean Ramos - <?php echo $pageTitle; ?>">

<meta name="twitter:card" content="player">
<meta name="twitter:site" content="@geanramos">
<meta name="twitter:title" content="GEAN RAMOS - <?php echo $pageTitle; ?> | SHORTS">
<meta name="twitter:description" content="Assista os melhores vídeos de <?php echo $pageAuthor; ?>. Acesse Agora!">
<meta name="twitter:image" content="https://img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg">
<meta name="twitter:player" content="https://gean.me/watch?v=<?php echo $id; ?>">
<meta name="twitter:player:width" content="720">
<meta name="twitter:player:height" content="720">
<meta name="twitter:site" content="@geanramos">

    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/jwplayer.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/provider.html5.js"></script>
    <script>jwplayer.key = "IMtAJf5X9E17C1gol8B45QJL5vWOCxYUDyznpA==";</script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/skins/seven.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:20px;top:120px;">
<!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a> | //static.addtoany.com/menu/page.js-->
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
</div>
<!-- AddToAny END -->
    <div id="video"></div>
    <script type="text/JavaScript">
        var playerInstance = jwplayer("video");
        playerInstance.setup({
            image: "https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg&w=405&h=720&output=jpg&q=80&t=square",
            file: "https://www.youtube.com/watch?v=<?php echo $id; ?>",
            mute: "false",
            autostart: "false",
            repeat: "false",
            abouttext: "Acesse",
            aboutlink: "https://formulanegocioonline.u1m.com.br",
            height: "100%",
            width: "100%",
            stretching: "uniform",
            primary: "html5",
            flashplayer: "https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/jwplayer.flash.swf",
            preload: "metadata",
            skin: {
                name: "seven",
                active: "#0099ff",
                inactive: "#f9f9f9",
                background: "#000000"
            },
            logo: {
                file: "https://i1.wp.com/formulanegocioonline.50x.com.br/logo-fno1.png?resize=122,50",
                hide: "false",
                link: "https://formulanegocioonline.u1m.com.br",
                margin: "15",
                position: "top-right",
            }
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/gh/geanramos/files/home-assets/puritym/js/page.js"></script>
</html>