		<?php
        $videoId = $_GET["v"];
        // URL do vídeo com o parâmetro ?v=
        $videoUrl = "https://pt.pornhub.com/view_video.php?viewkey=$videoId";

        // Obtém o conteúdo HTML da página do vídeo
        $html = file_get_contents($videoUrl);

        // Verifica se o conteúdo foi obtido com sucesso
        if ($html === false) {
            die('Erro ao obter conteúdo da página do vídeo.');
        }

        // Expressão regular para encontrar o trecho de script JSON-LD
        $pattern = '/<script type="application\/ld\+json">(.*?)<\/script>/s';

        // Executa a expressão regular no HTML para encontrar o script JSON-LD
        if (preg_match($pattern, $html, $matches)) {
            // Decodifica o JSON retornado em um array associativo
            $videoData = json_decode($matches[1], true);

            // Verifica se o JSON foi decodificado com sucesso
            if ($videoData !== null && isset($videoData['@type']) && $videoData['@type'] === 'VideoObject') {
                // Extrai e formata as informações do vídeo conforme necessário
                $name = $videoData['name'];
                $duration = formatDuration($videoData['duration']);
                $thumbnailUrl = $videoData['thumbnailUrl'];
                $uploadDate = formatDate($videoData['uploadDate']);
                $description = $videoData['description'];
                $author = $videoData['author'];

                // Extrai as interações do vídeo
                $watchCount = $videoData['interactionStatistic'][0]['userInteractionCount'];
                $likeCount = $videoData['interactionStatistic'][1]['userInteractionCount'];

                // Exibe as informações do vídeo
                // echo '<p><strong>Título:</strong> ' . $name . '</p>';
                // echo '<p><strong>Duração:</strong> ' . $duration . '</p>';
                // echo '<p><strong>Thumbnail:</strong> <img src="' . $thumbnailUrl . '" alt="Thumbnail do Vídeo"></p>';
                // echo '<p><strong>Data de Publicação:</strong> ' . $uploadDate . '</p>';
                // echo '<p><strong>Descrição:</strong> ' . $description . '</p>';
                // echo '<p><strong>Autor:</strong> ' . $author . '</p>';
                // echo '<p><strong>Visualizações:</strong> ' . $watchCount . '</p>';
                // echo '<p><strong>Curtidas:</strong> ' . $likeCount . '</p>';
            } else {
                echo 'Não foi possível encontrar informações válidas do vídeo.';
            }
        } else {
            echo '<!--Não foi possível encontrar o script JSON-LD na página.-->';
        }

        // Função para formatar a duração do vídeo
        function formatDuration($duration) {
            $interval = new DateInterval($duration);
            return $interval->format('%h horas %i minutos');
        }

        // Função para formatar a data de publicação
        function formatDate($uploadDate) {
            $date = new DateTime($uploadDate);
            $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
            return $date->format('d/m/Y H:i');
        }
        ?>
<!--

><(((('>
╔═╗╔═╗╔═╗╔╗╔ ╔╦╗╔═╗
║ ╦║╣ ╠═╣║║║ ║║║║╣ 
╚═╝╚═╝╩ ╩╝╚╝o╩ ╩╚═╝
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
  <base href="https://gean.me">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:image:src" content="<?php echo $thumbnailUrl; ?>">
  <meta property="og:image" content="<?php echo $thumbnailUrl; ?>">
  <meta name="twitter:title" content="<?php echo $name; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="https://ei.phncdn.com/www-static/favicon.ico?cache=2024041001" type="image/x-icon">
  <meta name="description" content="<?php echo $description; ?>">
  <link rel="alternate" type="application/rss+xml" title="U1M Hub - Feed" href="http://feeds.feedburner.com/deconstructing" />
  
  
  <title><?php echo $name; ?></title>
  <link rel="stylesheet" href="https://gean.me/receita/assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="https://gean.me/receita/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/theme/css/style.css">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"></noscript>
  <link rel="preload" as="style" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=ING7Nt"><link rel="stylesheet" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=ING7Nt" type="text/css">
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
                    <a href="./ph-home.php">
                        <img src="https://static-cdn77.xvideos-cdn.com/v3/img/skins/default/logo/xvideos.black.svg" alt="U1M Hub" style="height: 3rem;">
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
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./ph-home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#features4-n">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="https://www.google.com/search?q=receita+site:gean.me" target="_blank">Receitas</a>
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
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-secondary display-4" href="#form4-6"><span class="mobi-mbri mobi-mbri-share mbr-iconfont mbr-iconfont-btn"></span>E-books Premium</a></div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="video5 cid-u9pRtVKEQS" id="video5-q">
    <div class="container">
        <div class="title-wrapper mb-5">            
        </div>
        <div class="row align-items-center">
		<?php
        // Verifica se o parâmetro ?v= foi passado na URL
        if (isset($_GET['v']) && !empty($_GET['v'])) {
            // Obtém o ID do vídeo da URL
            $videoId = $_GET['v'];

            // Monta a URL de incorporação do vídeo do YouTube
            $embedUrl = "https://pt.pornhub.com/embed/$videoId";

            // Exibe o vídeo usando um iframe
            echo '<div class="col-12 col-lg-6 video-block">';
            echo '<div class="video-wrapper"><iframe class="mbr-embedded-video" src="' . $embedUrl . '" width="560" height="315" frameborder="0" allowfullscreen></iframe></div>';
            echo '<p class="mbr-description pt-2 mbr-fonts-style display-4">U1M Hub</p>';
			echo '</div>';
        } else {
            // Se o parâmetro ?v= não foi fornecido, exibe uma mensagem de erro
            echo '<div class="col-12 col-lg-6 video-block">';
            echo '<div class="video-wrapper"><iframe class="mbr-embedded-video" src="https://www.youtube.com/embed/LMD6MqwErzc?rel=0&mute=1&showinfo=0&autoplay=1&loop=0" width="560" height="315" frameborder="0" allowfullscreen></iframe></div>';
            echo '<p class="mbr-description pt-2 mbr-fonts-style display-4">U1M Hub</p>';
			echo '</div>';
        }
        ?>
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h3 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                        <strong><?php echo $name; ?></strong></h3>
                    <p class="mbr-text mbr-fonts-style display-7"><?php echo $name; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features4 cid-u9pQbjaghj" id="features4-n">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>U1M Hub</strong></h4>
            <h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">Os melhores vídeos de U1M Hub. Assista Agora!</h5>
        </div>
        <div class="row mt-4">
            <div class="item features-image сol-12 col-md-6 col-lg-3">
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="#top"><img src="https://geanramos.com/cdn/assets/images/team3.jpeg" alt="TITULO DA IMG" title=""></a>
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5"><strong>Design</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">Website Design</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7"><a href="#top" class="text-primary">You don't have to code to create your own site. Select one of available themes in the Mobirise Site Maker.</a></p>
                    </div>
                    
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-3">
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="#top"><img src="https://geanramos.com/cdn/assets/images/background13-1.jpeg" alt="TITULO DA IMG" title=""></a>
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5"><strong>Code</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">
                            HTML/CSS Coding</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7"><a href="page1.html#features4-d" class="text-primary">You don't have to code to create your own
                            site. Select one of available themes in the Mobirise Site Maker.</a></p>
                    </div>
                    
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-3">
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="#top"><img src="https://geanramos.com/cdn/assets/images/mbr-4.jpeg" alt="TITULO DA IMG" title=""></a>
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5"><strong>Branding</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">Creating</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">You don't have to code to create your own site. Select one of available themes in the Mobirise Site Maker.<br></p>
                    </div>
                    
                </div>
            </div><div class="item features-image сol-12 col-md-6 col-lg-3">
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="#top"><img src="https://geanramos.com/cdn/assets/images/team4.jpeg" alt="TITULO DA IMG" title="" data-slide-to="3" data-bs-slide-to="4"></a>
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5"><strong>Branding</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">Creating</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7">You don't have to code to create your own site. Select one of available themes in the Mobirise Site Maker.<br></p>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer3 cid-u9pQbjSr6D" once="footers" id="footer3-o">

    

    

    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                <li class="foot-menu-item mbr-fonts-style display-7">
                <a class="text-white" href="./ph-home.php" target="_self">Sobre</a></li><li class="foot-menu-item mbr-fonts-style display-7">
                <a class="text-white" href="./ph-home.php" target="_self">Receitas</a></li><li class="foot-menu-item mbr-fonts-style display-7">
                <a class="text-white" href="https://www.google.com/search?q=receita+site:gean.me" target="_blank">Receitas</a></li></ul>
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
</section><script src="https://geanramos.com/cdn/assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="https://geanramos.com/cdn/assets/smoothscroll/smooth-scroll.js"></script>  </script>  <script src="https://geanramos.com/cdn/assets/dropdown/js/navbar-dropdown.js"></script>  </script>  <script src="https://geanramos.com/cdn/assets/theme/js/script.js"></script>  
  
  
</body>
</html>
