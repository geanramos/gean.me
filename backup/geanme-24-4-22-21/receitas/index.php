<!--
><(((('>
╔═╗╔═╗╔═╗╔╗╔ ╔╦╗╔═╗
║ ╦║╣ ╠═╣║║║ ║║║║╣ 
╚═╝╚═╝╩ ╩╝╚╝o╩ ╩╚═╝
-->
<?php
    $name = $_GET['url'];

    // URL do Embed
    $url = 'https://www.receiteria.com.br/' . $name . '/embed/';

    // Obtém o conteúdo da página
    $html = file_get_contents($url);

    // Expressão regular para extrair o postid
    $pattern = '/postid-(\d+)/';

    // Procura pelo padrão na página
    if (preg_match($pattern, $html, $matches)) {  
    
        // URL do JSON
        $json_url = 'https://www.receiteria.com.br/wp-json/oembed/1.0/embed?url=https://www.receiteria.com.br/' . $name . '/';

        // Obtém o JSON
        $json_data = file_get_contents($json_url);

        // Decodifica o JSON
        $data = json_decode($json_data, true);

        // Verifica se os dados foram decodificados com sucesso
        //if ($data) {
        //    echo '<h1>' . $data['title'] . '</h1>';
        //    echo '<p><strong>Thumbnail URL:</strong> <img src="' . $data['thumbnail_url'] . '" alt="Thumbnail"></p>';
        //    echo '<p><strong>Description:</strong> ' . $data['description'] . '</p>';
        //    echo '<p><strong>Author Name:</strong> ' . $data['author_name'] . '</p>';
        //    echo '<p><strong>Author URL:</strong> ' . $data['author_url'] . '</p>';
        //    echo '<p><strong>Post Id:</strong> ' . $matches[1] . '</p>';
        //    echo '<p><strong>Thumbnail Width:</strong> ' . $data['thumbnail_width'] . '</p>';
        //    echo '<p><strong>Thumbnail Height</strong> ' . $data['thumbnail_height'] . '</p>';
        //} else {
        //    echo 'Erro ao carregar os dados.';
        //}
        // URL da imagem
        $urlImgName = $data['thumbnail_url'];
        
        // Obtém o nome do arquivo da URL
        $imgName = basename($urlImgName);
        // Exibe o nome do arquivo
        //echo '<p><strong>Img Name</strong> ' . $imgName . '</p>';

        // Verifica se $matches está definido antes de usá-lo
        if (isset($matches[1])) {
            // URL da página
            $url = 'https://www.receiteria.com.br/imprimir/?id=' . $matches[1] . '';

            // Obtém o conteúdo da página
            $html = file_get_contents($url);

            // Define o padrão de início e fim
            $pattern_start = '/<p><i class="fa-solid fa-clock">/';
            $pattern_end = '/<hr>/';
            
            // Substitui as ocorrências de 'www.receiteria.com.br' por 'gean.me'
            $html = str_replace('www.receiteria.com.br', 'gean.me', $html);
            $html = str_replace('youtube.com', 'gean.me', $html);
            $html = str_replace('input class="form-check-input" type="checkbox" value ', '', $html);
            $html = str_replace('"><label for="ingrediente-', '', $html);
            $html = str_replace('</label>', '', $html);
            $html = str_replace('fa-solid fa-bread-slice', 'fa-solid fa-utensils', $html);

            // Procura pelo padrão de início
            if (preg_match($pattern_start, $html, $start_match, PREG_OFFSET_CAPTURE)) {
                // Procura pelo padrão de fim
                if (preg_match($pattern_end, $html, $end_match, PREG_OFFSET_CAPTURE, $start_match[0][1])) {
                    // Extrai o conteúdo entre os padrões de início e fim
                    $content = substr($html, $start_match[0][1], $end_match[0][1] - $start_match[0][1]);
                    
                    // Exibe o conteúdo
                    // echo $content;
                //} else {
                    // Se não encontrar o padrão de fim, exibe uma mensagem de erro
                   // echo "Padrão de fim não encontrado.";
                }
            //} else {
                // Se não encontrar o padrão de início, exibe uma mensagem de erro
                //echo "Padrão de início não encontrado.";
            }
        }
    }
?>
<?php
// Obtém a data atual no formato desejado
$DateDia = date("Y-m-d");

// Exibe a data atual
// echo $DateDia;
?>
<?php
$timezone = new DateTimeZone('America/Sao_Paulo');
$dateTime = new DateTime('now', $timezone);
$DateAgora = $dateTime->format('Y-m-d\TH:i:sP');
// echo $DateAgora;
?><!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="dns-prefetch" href="https://images.weserv.nl">
  <link rel="dns-prefetch" href="https://geanramos.com">
  <link rel="dns-prefetch" href="https://gean.me">
  <title><?php echo $data['title']; ?> - Gean Ramos</title>
  <meta name="description" content="<?php echo $data['description']; ?>">
  <!-- : Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia -->
  <link rel="alternate" type="application/rss+xml" title="Fogo na Cozinha - Atom" href="https://feeds.feedburner.com/196sabores" />
  <link rel="alternate" type="application/rss+xml" title="Fogo na Cozinha - Feed" href="https://gean.me/receita/feed?p=<?php echo $name; ?>" />
  <link rel="alternate" type="application/rss+xml" title="Fogo na Cozinha - RSS" href="https://gean.me/receita/feed2.xml" />

  <link rel="alternate" type="application/rss+xml" title="Arroz e Risotos - Feed" href="https://feeds.feedburner.com/geanme/arroz-e-risotos" />
<link rel="alternate" type="application/rss+xml" title="Aves - Feed" href="https://feeds.feedburner.com/geanme/aves" />
<link rel="alternate" type="application/rss+xml" title="Bebidas - Feed" href="https://feeds.feedburner.com/geanme/bebidas" />
<link rel="alternate" type="application/rss+xml" title="Bolos - Feed" href="https://feeds.feedburner.com/geanme/bolos" />
<link rel="alternate" type="application/rss+xml" title="Carnes - Feed" href="https://feeds.feedburner.com/geanme/carnes" />
<link rel="alternate" type="application/rss+xml" title="Doces e Sobremesas - Feed" href="https://feeds.feedburner.com/geanme/doces-e-sobremesas" />
<link rel="alternate" type="application/rss+xml" title="Entradas e Petiscos - Feed" href="https://feeds.feedburner.com/geanme/entradas-e-petiscos" />
<link rel="alternate" type="application/rss+xml" title="Lanches e Salgados - Feed" href="https://feeds.feedburner.com/geanme/lanches-e-salgados" />
<link rel="alternate" type="application/rss+xml" title="Massas - Feed" href="https://feeds.feedburner.com/geanme/massas" />
<link rel="alternate" type="application/rss+xml" title="paes - Feed" href="https://feeds.feedburner.com/geanme/paes" />
<link rel="alternate" type="application/rss+xml" title="Saladas e Acompanhamentos - Feed" href="https://feeds.feedburner.com/geanme/saladas-e-acompanhamentos" />
<link rel="alternate" type="application/rss+xml" title="Sopas e Caldos - Feed" href="https://feeds.feedburner.com/geanme/sopas-e-caldos" />

    <!--inicio dos cards-->
    <link rel="canonical" href="https://gean.me/receita/<?php echo $name; ?>/" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $data['title']; ?> | Gean Ramos" />
    <meta property="og:description" content="<?php echo $data['description']; ?>" />
    <meta property="og:url" content="https://gean.me/receita/<?php echo $name; ?>/" />
    <meta property="og:site_name" content="GeanRamos" />
	<meta property="article:published_time" content="<?php echo $DateDia; ?>T00:01:00-03:00" />
	<meta property="article:modified_time" content="<?php echo $DateAtual; ?>" />
    <meta property="og:category" content="Receitas" />
    <meta property="og:image" content="https://gean.me/cdn/760x427/<?php echo $imgName; ?>" />
    <meta property="og:image:width" content="760" />
    <meta property="og:image:height" content="427" />
    <meta property="fb:pages" content="312914505389872">
	
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $data['title']; ?> | Gean Ramos" />
    <meta name="twitter:description" content="<?php echo $data['description']; ?>" />
    <meta name="twitter:image" content="https://gean.me/cdn/760x427/<?php echo $imgName; ?>" />
    <meta name="twitter:site" content="@geanramos">
    <!--fim dos card-->
    <script type="application/ld+json"> { "@context": "https://schema.org", "@type": "Recipe", "mainEntityOfPage": { "@type": "WebPage", "@id": "https://gean.me/receitas/<?php echo $name; ?>/" }, "headline": "<?php echo $data['title']; ?> | Gean Ramos", "image": { "@type": "ImageObject", "url": "https://gean.me/cdn/760x427/<?php echo $imgName; ?>", "height": 760, "width": 427 }, "datePublished": "<?php echo $DateDia; ?>T00:01:00-03:00", "dateModified": "<?php echo $DateAgora; ?>", "author": [ { "@type": "Person", "name": "Gean Ramos", "url": "https://www.twitter.com/geanramos/" } ], "publisher": { "@type": "Organization", "name": "Gean Ramos", "url": "https://gean.me/", "logo": { "@type": "ImageObject", "url": "https://cdn.jsdelivr.net/gh/geanramos/files/Qt9Ceky.png", "height": 77, "width": 200 } }, "description": "<?php echo $data['description']; ?>" } </script>
    <script type="application/ld+json"> { "@context": "https://schema.org", "@type": "Recipe", "author": "Fogo na Cozinha", "cookTime": "PT30M", "datePublished": "<?php echo $DateDia; ?>T00:01:34-03:00", "description": "<?php echo $data['description']; ?>", "image": "https://gean.me/cdn/760x427/<?php echo $imgName; ?>", "recipeIngredient": [ "Açúcar, tempero e tudo que há de bom", "Estes foram os ingredientes escolhidos para criar as garotinhas perfeitas", "Mas o professor Utônio, acidentalmente, acrescentou um ingrediente extra na mistura. O elemento X!", "E assim nasceram as meninas Superpoderosas, usando seus ultra-super poderes. Florzinha, Lindinha e Docinho, têm dedicado suas vidas combatendo o crime e as forças do mal!" ], "name": "<?php echo $data['title']; ?> | Gean Ramos" } </script>
  <link rel="stylesheet" href="https://gean.me/receita/assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/dropdown/css/style.css">-->
  <link rel="stylesheet" href="https://gean.me/receita/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"></noscript>
  <link rel="preload" as="style" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=sCj2Py">
  <link rel="stylesheet" href="https://geanramos.com/cdn/assets/mobirise/css/mbr-additional.css?v=sCj2Py" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <style>body { font-family: 'Poppins', sans-serif; }div.item-img, div.image-wrapper img { border-radius: 8px; box-shadow: 0 0 4px rgb(0 0 0 / 70%); }.btn-secondary, .btn-secondary:active { background-color: #009d43 !important; border-color: #009d43 !important; color: #ffffff !important;}.text-primary { color: #000000 !important; }</style>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7660935659627048" crossorigin="anonymous" type="7a9a049b59ff1eafa4a9d5d1-text/javascript"></script>

</head>
<body>  
  <section data-bs-version="5.1" class="menu menu2 cid-sFF0ciwnEL" once="menu" id="menu2-0">    
    <nav class="navbar navbar-dropdown navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="../../receita.html">
                        <img src="https://i1.wp.com/cdn.jsdelivr.net/gh/geanramos/files/logo/2.png?resize=500,125" alt="Receitas por Gean Ramos" style=" height: 3rem; ">
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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#features4-0">Home</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="#features4-0">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="https://www.google.com/search?q=receita+site:gean.me" target="_blank" >Receitas</a>
                    </li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://www.facebook.com/sharer/sharer.php?u=https://gean.me/receita/<?php echo $name; ?>/?utm_source=facebook&linkname=<?php echo $data['title']; ?>&linknote=<?php echo $data['description']; ?>" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://twitter.com/intent/tweet?url=https://gean.me/receita/<?php echo $name; ?>/?utm_source=twitter&via=geanramos&text=<?php echo $data['description']; ?>" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-twitter socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://api.whatsapp.com/send?text=<?php echo $data['description']; ?> https://gean.me/receita/<?php echo $name; ?>/?utm_source=whatsapp" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-whatsapp socicon"></span>
                    </a>                    
                </div>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-secondary display-4" href="https://pay.hotmart.com/W91098666M?checkoutMode=10&sck=gean|receita|navbarbuttons|<?php echo $matches[1]; ?>" target="_blank"><span class="mobi-mbri mobi-mbri-share mbr-iconfont mbr-iconfont-btn"></span>E-books Premium</a></div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="features16 cid-u8E4KKtfbb" id="features16-2">

<center>
    <a href="https://1wprru.life/v3/fortune-tiger#jmhu" target="_blank">
        <img src="https://i1.wp.com/i.imgur.com/NjVyhSt.png?resize=728,147" alt="fortune tiger" width="728px" style="max-width: 728px;border-radius: 8px;">
    </a>
</center>

    <div class="container">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-12 col-lg">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style display-2"><strong><?php echo $data['title']; ?></strong></h6>
                        <p class="mbr-text mbr-fonts-style mb-4 display-4">
                        <?php echo $data['description']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="image-wrapper">
                        <img src="https://gean.me/cdn/760x427/<?php echo $imgName; ?>" alt="<?php echo $data['title']; ?> por Gean Ramos">
                    </div>
                    
                </div>
                
        
            </div>
<center>
    <a href="https://1wprru.life/v3/fortune-tiger#jmhu" target="_blank">
        <img src="https://i.imgur.com/DvUyb5H.png" alt="fortune tiger" style="max-width: 728px;border-radius: 8px;">
    </a>
    </center>
        </div>
    </div>

</section>



<section data-bs-version="5.1" class="features4 cid-u8E4cicDya" id="features4-0">
    
    
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Outras Receitas</strong></h4>
            <h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5">Em busca de ótimas receitas e grandes histórias.</h5>
        </div>
        <div class="row mt-4">
            <?php
// URL da página com as receitas de cocada
$url = 'https://www.receiteria.com.br/' . $name . '/';

// Função para substituir URLs conforme especificado
function replaceUrl($url) {
    //return str_replace('https://www.receiteria.com.br/wp-content/uploads/', 'https://gean.me/cdn/400x225/', $url);
    //return str_replace('-730x480', '', $url);
}

// Função para obter o conteúdo HTML da URL
function getUrlContent($url) {
    $options = [
        'http' => [
            'method' => 'GET',
            'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
        ]
    ];
    $context = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

// Obter o conteúdo HTML da página
$html = getUrlContent($url);

// Regex para encontrar todas as receitas
 $pattern = '/<div class="receita">.*?<a href="(.*?)".*?<img src="(.*?)".*?<p>(.*?)<\/p>/s';
// $pattern = '/<div class="receita">.*?<div class="recipe-head">.*?<h2>(.*?).*?<img src="(.*?)".*?<p>(.*?)<\/p>/s';

preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);

// Array para armazenar as receitas
$recipes = [];

// Processar os resultados encontrados
foreach ($matches as $match) {
    $link = str_replace('https://www.receiteria.com.br/', 'https://gean.me/', $match[1]);
    $imagem = str_replace('https://www.receiteria.com.br/wp-content/uploads/', 'https://gean.me/cdn/400x225/', $match[2]);
    $descricao = strip_tags($match[3]); // Remover tags HTML da descrição
    //$titulo = strip_tags($match[4])

    // Adicionar a receita ao array
    $recipes[] = [
        'link' => $link,
        'imagem' => $imagem,
        'descricao' => $descricao
        //'titulo' => $titulo
    ];
}

// Exibir as receitas em uma página HTML
?>

    <?php foreach ($recipes as $recipe): ?>
<div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <a href="<?php echo $recipe['link']; ?>"><img src="<?php echo $recipe['imagem']; ?>" alt="" title=""></a>
                    </div>
                    <div class="item-content">
                        <!--<h5 class="item-title mbr-fonts-style display-5"><strong>Receita</strong></h5>-->
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7">Receita</h6>
                        <p class="mbr-text mbr-fonts-style mt-3 display-7"><a href="<?php echo $recipe['link']; ?>" class="text-primary"><?php echo $recipe['descricao']; ?></a></p>
                    </div>
                    
                </div>
            </div>
    <?php endforeach; ?>

            
        </div>
    </div>
</section>
 <!-- AddToAny BEGIN -->
 <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right: 20px; top: 120px;">
  <!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a> | //static.addtoany.com/menu/page.js-->
  <a class="a2a_button_whatsapp"></a>
  <a class="a2a_button_facebook"></a>
  <a class="a2a_button_twitter"></a>
  <a class="a2a_button_pinterest"></a>
 </div>
 <!-- AddToAny END -->
<style>
  /* Estilo da imagem e do efeito hover */
  .item-img {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
  }
  .item-img img {
    transition: transform 0.3s ease;
  }
  .item-img:hover img {
    transform: scale(1.1);
  }
</style>
<section data-bs-version="5.1" class="footer3 cid-u8E4WLCTyX" once="footers" id="footer3-3">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                <li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="#top" target="_self">Sobre</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="https://www.google.com/search?q=receita+site:gean.me" target="_blank">Receitas</a></li><li class="foot-menu-item mbr-fonts-style display-7"><a class="text-white" href="https://pay.hotmart.com/W91098666M?checkoutMode=10&sck=gean|receita|footmenu|<?php echo $matches[1]; ?>" target="_blank">E-books</a></li></ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">
                <div class="soc-item">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://gean.me/receita/<?php echo $name; ?>/?utm_source=facebook&linkname=<?php echo $data['title']; ?>&linknote=<?php echo $data['description']; ?>" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://twitter.com/intent/tweet?url=https://gean.me/receita/<?php echo $name; ?>/?utm_source=twitter&via=geanramos&text=<?php echo $data['description']; ?>" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://api.whatsapp.com/send?text=<?php echo $data['description']; ?> https://gean.me/receita/<?php echo $name; ?>/?utm_source=whatsapp" target="_blank">
                            <span class="socicon-whatsapp socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://pinterest.com/pin/create/button/?url=https://gean.me/receita/<?php echo $name; ?>/?utm_source=pinterest&description=<?php echo $data['description']; ?>&media=https://i1.wp.com/www.receiteria.com.br/wp-content/uploads/<?php echo $imgName; ?>?resize=1000,1500" target="_blank">
                            <span class="socicon-pinterest socicon mbr-iconfont mbr-iconfont-social"></span>
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
</section><script src="https://geanramos.com/cdn/assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="https://geanramos.com/cdn/assets/smoothscroll/smooth-scroll.js"></script>  <script src="https://geanramos.com/cdn/assets/ytplayer/index.js"></script>  <script src="https://geanramos.com/cdn/assets/dropdown/js/navbar-dropdown.js"></script>  <script src="https://geanramos.com/cdn/assets/theme/js/script.js"></script> <script src="https://cdn.jsdelivr.net/gh/geanramos/files/home-assets/puritym/js/page.js"></script>
</body>
</html>