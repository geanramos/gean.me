<?php
function extractChannelId($videoUrl) {
    $html = file_get_contents($videoUrl);
    $pattern = '/\"channelId\":\"(.*?)\"/';
    preg_match($pattern, $html, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
    return null;
}

if (isset($_GET['v'])) {
    $videoId = $_GET['v'];
    $videoUrl = "https://www.youtube.com/watch?v=$videoId";
    $channelId = extractChannelId($videoUrl);

    if ($channelId) {
        $feedUrl = "https://www.youtube.com/feeds/videos.xml?channel_id=$channelId";
        $xml = simplexml_load_file($feedUrl);
        $author = (string)$xml->author->name;
        $title1 = (string)$xml->entry->title;
        $description = (string)$xml->entry->children('media', true)->group->description;
        $pubDate = (string)$xml->entry->published;
		$dataFormatada = date("d M Y", strtotime($pubDate));
    }
}
    // inicio post relacionado
    $url = $channelId;
    $curl = curl_init("https://www.youtube.com/feeds/videos.xml?channel_id=" . $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($curl);
    curl_close($curl);
    if ($content === false) {
        echo "Falha ao obter o conteúdo da URL.";
        exit;
    }
    $xml = simplexml_load_string($content);
    $authorX = (string)$xml->author->name;
	$dataAtualX = date("Y-m-d");
    // fim post relacionado
	
function getDataPublicacao($UrlVideoYT) {
    $html = file_get_contents($UrlVideoYT);
    
    if ($html) {
        // Use uma expressão regular para encontrar a data de publicação
        if (preg_match('/<meta itemprop="datePublished" content="([^"]+)"/', $html, $matches)) {
            $publishedDate = $matches[1];
            $formattedDate = date("d M Y", strtotime($publishedDate));
            return $formattedDate;
        } else {
            return "01/10/2023";
        }
    } else {
        return "00/00/0000";
    }
}
$UrlVideoYT = "https://www.youtube.com/watch?v=$videoId"; // URL do vídeo do YouTube
$date = getDataPublicacao($UrlVideoYT);
?>

<?php
$id = $_GET["v"];
$url = 'https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=' . $id . '&format=json';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
if ($response === false) {
    echo 'Falha ao obter informações do video.';
    exit;
}
$videoData = json_decode($response, true);
if (empty($videoData)) {
    echo 'Falha ao obter informações do vídeo.';
    exit;
}
$title = $videoData['title'];
$authorName = $videoData['author_name'];
$videoUrl = $videoData['html'];
$thumbnailUrl = $videoData['thumbnail_url'];
?><!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="robots" content="index, follow">
    <title>Gean Ramos - <?php echo $title; ?></title>
    <meta name="description" content="Assista os melhores vídeos de <?php echo $author; ?>. Acesse Agora!" />
    <link rel="canonical" href="https://gean.me/watch?v=<?php echo $videoId; ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php echo $author; ?> - Feed" href="https://gean.me/feeds/videos.xml?channel_id=<?php echo $channelId; ?>" />

<!-- Facebook Card -->
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=5.0,user-scalable=yes">
<meta property="og:site_name" content="Gean Ramos">
<meta property="og:title" content="Gean Ramos - <?php echo $title; ?>">
<meta property="og:description" content="Assista os melhores vídeos de <?php echo $author; ?>. Acesse Agora!">
<meta property="og:url" content="https://gean.me/watch?v=<?php echo $videoId; ?>">
<meta property="fb:pages" content="312914505389872">
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="video.other">
<meta property="og:updated_time" content="<?php echo $pubDate; ?>">
<meta property="og:image" content="https://img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg">
<meta property="og:image:secure_url" content="https://img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="1280">
<meta property="og:image:height" content="720">
<meta property="og:video:url" content="https://gean.me/embed/views.php?v=<?php echo $videoId; ?>">
<meta property="og:video:secure_url" content="https://gean.me/embed/views.php?v=<?php echo $videoId; ?>">
<meta property="og:video:type" content="text/html">
<meta property="og:video:width" content="1280">
<meta property="og:video:height" content="720">
<meta property="video.other:tag" content="Gean Ramos">
<meta property="video.other:tag" content="<?php echo $author; ?>">
<meta property="video.other:tag" content="Vídeo no Youtube">
<meta property="video.other:tag" content="YouTube">
<meta property="video.other:tag" content="Vídeos">
<meta property="video.other:tag" content="<?php echo $title; ?>">
<!-- Twitter Card -->
<meta name="twitter:card" content="player">
<meta name="twitter:site" content="@geanramos">
<meta name="twitter:title" content="Gean Ramos - <?php echo $title; ?>">
<meta name="twitter:description" content="Assista os melhores vídeos de <?php echo $author; ?>. Acesse Agora!">
<meta name="twitter:image" content="https://img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg">
<meta name="twitter:player" content="https://gean.me/embed/twitter/<?php echo $id; ?>">
<meta name="twitter:player:width" content="1280">
<meta name="twitter:player:height" content="720">
<meta name="twitter:site" content="@geanramos">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700;900&display=swap" as="style" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <!-- Ionicons -->
    <link rel="preload" href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" as="style" />
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet" />
    <script>
      if (localStorage.getItem("theme") === "dark") {
        document.documentElement.setAttribute("dark", "");
        document.documentElement.classList.add("dark-mode");
      }
    </script>
	<link rel="stylesheet" type="text/css" href="./watch.css?v=03">
  </head>

  <body>
    <!-- begin header -->
    <header class="header" id="top">
      <div class="container">
        <div class="row">
          <div class="header__inner col col-12">
            <div class="logo">
              <a class="logo__link" href="#mais">
                Gean Ramos
              </a>
            </div>

            <nav class="main-nav">
              <div class="main-nav__box">
                <div class="nav__icon-close">
                  <i class="ion ion-md-close"></i>
                </div>
                <div class="nav__title">Menu</div>
                <ul class="nav__list list-reset">
                  <li class="nav__item">
                    <a href="#mais" class="nav__link">Home</a>
                  </li>

                  <li class="nav__item">
                    <a href="./mini-curso-gratis" class="nav__link">Grana Fácil</a>
                  </li>

                  <li class="nav__item">
                    <a href="https://go.hotmart.com/A1939024g?ap=96e9&src=watch|como-funciona|<?php echo $videoId; ?>" class="nav__link">Como Funciona?</a>
                  </li>

                  <li class="nav__item">
                    <a href="./channel/<?php echo $channelId; ?>" class="nav__link">Feed</a>
                  </li>

                  <li class="nav__item nav__item-icon">
                    <div class="toggle-theme">
                      <div class="toggle-moon" title="Enable dark mode"><i class="ion ion-ios-moon"></i></div>
                      <div class="toggle-sun" title="Enable light mode"><i class="ion ion-ios-sunny"></i></div>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="nav-button">
              <i class="nav__icon icon__menu ion ion-md-menu"></i>
              <i class="nav__icon icon__search ion ion-md-search"></i>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <!-- begin search -->
    <div class="search">
      <div class="container">
        <div class="row">
          <div class="col col-12">
            <div class="search__box">
              <div class="search__group">
                <div class="search__close">
                  <i class="ion ion-md-close"></i>
                </div>
                <form action="./pesquisando" method="get" id="search-form" accept-charset="utf-8">
                <label for="js-search-input" class="screen-reader-text">Buscar...</label>
                <input type="search" id="q" name="q" class="search__text" autocomplete="off" placeholder="Digite o que deseja encontrar" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row search-results-list" id="js-results-container"></div>
      </div>
    </div>
    <!-- end search -->

    <!-- begin content -->
    <main class="content" aria-label="Content">
      <div class="post-head">
        <div class="container">
          <div class="row">
            <div class="col col-12">
              <div class="post-video">
                <div class="post-video__wrap">
                  <iframe src="https://gean.me/embed/views.php?v=<?php echo $videoId; ?>" loading="lazy" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
              </div>
            </div>

            <div class="col col-12">
              <div class="post__info post__info-video">
                <div class="post__tags">
                  <a href="#mais" class="post__tag">Home</a>
                  <a href="https://gean.me/channel/<?php echo $channelId; ?>" class="post__tag"><?php echo $author; ?></a>
                  <a href="https://go.hotmart.com/A1939024g?ap=96e9&src=watch|renda-extra|<?php echo $videoId; ?>" class="post__tag">Renda Extra</a>
                  <a href="https://go.hotmart.com/A1939024g?ap=0fbe&src=watch|15k-mes|<?php echo $videoId; ?>" class="post__tag">3K a 15K Mês</a>
                </div>

                <h1 class="post__title"><?php echo $title; ?></h1>

                <div class="post__meta">
                  <a href="https://gean.me/channel/<?php echo $channelId; ?>" class="post__author-image">
                    <img class="lazy" data-src="https://i1.wp.com/static.vecteezy.com/system/resources/previews/009/469/625/large_2x/play-button-youtube-video-player-red-play-button-free-vector.jpg?resize=50,50" alt="<?php echo $author; ?>" />
                  </a>

                  <div class="post__meta-bottom">
                    <a class="post__author" href="./channel/<?php echo $channelId; ?>"><?php echo $author; ?></a>
                    <time class="post__date" datetime="<?php echo $pubDate; ?>"><?php echo $date; ?></time>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- begin post -->
      <div class="container animate">
        <article class="post">
          <div class="post__content">
            <p>
              Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic
              world view of disruptive innovation via workplace <a href="./channel/<?php echo $channelId; ?>"><?php echo $author; ?></a> diversity and empowerment.
            </p>

            <p>
              Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud
              solution. User generated content in real-time will have multiple touchpoints for offshoring.
            </p>

            <h3 id="synergistically-evolve">Synergistically evolve</h3>

            <p>
              Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on
              the start-up mentality to derive convergence on cross-platform integration.
            </p>

            <p>
              <!-- <img src="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&t=square#wide" alt="City" /> -->
			  <img src="https://img.youtube.com/vi/<?php echo $videoId; ?>/maxresdefault.jpg#wide" alt="Gean Ramos - <?php echo $title; ?>" />
              <em>Photo by <a href="./channel/<?php echo $channelId; ?>"><?php echo $author; ?></a> on <a href="./channel/<?php echo $channelId; ?>">YouTube</a></em>
            </p>
			
            <p>
              Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic
              world view of disruptive innovation via workplace diversity and empowerment.
            </p>

            <p>
              Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close
              the loop on focusing solely on the bottom line.
            </p>

            <blockquote>
              <p>The longer I live, the more I realize that I am never wrong about anything, and that all the pains I have so humbly taken to verify my notions have only wasted my time!</p>
            </blockquote>

            <p>
              Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud
              solution. User generated content in real-time will have multiple touchpoints for offshoring.
            </p>

            <p>
              Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric “outside the box” thinking. Completely pursue scalable customer service through
              sustainable <a href="https://unsplash.com/photos/10py7Mvmf1g">Ken Cheung</a> potentialities.
            </p>

            <h3 id="podcasting">Podcasting</h3>

            <p>
              Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or
              “organic” sources.
            </p>

            <p>
              <img src="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&t=square" alt="Gean Ramos - <?php echo $title; ?>" /> <em>Photo by <a href="https://gean.me/channel/<?php echo $channelId; ?>"><?php echo $author; ?></a> on <a href="https://gean.me/channel/<?php echo $channelId; ?>">YouTube</a></em>
            </p>

            <p>
              Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art
              customer service.
            </p>

            <p>
              Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical
              architectures.
            </p>

            <p>
              Credibly reintermediate backend ideas for cross-platform models. Continually reintermediate integrated processes through technically sound intellectual capital. Holistically foster superior methodologies without market-driven
              best practices.
            </p>
          </div>

          <div class="post__share">
            <ul class="share__list list-reset">
              <li class="share__item">
                <a
                  class="share__link share__twitter"
                  href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=https://gean.me/watch?v=<?php echo $videoId; ?>"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on Twitter"
                  rel="nofollow">
                  <i class="ion ion-logo-twitter"></i>
                </a>
              </li>
              <li class="share__item">
                <a
                  class="share__link share__facebook"
                  href="https://www.facebook.com/sharer/sharer.php?u=https://gean.me/watch?v=<?php echo $videoId; ?>"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on Facebook"
                  rel="nofollow">
                  <i class="ion ion-logo-facebook"></i>
                </a>
              </li>
              <li class="share__item">
                <a
                  class="share__link share__pinterest"
                  href="http://pinterest.com/pin/create/button/?url=https://gean.me/watch?v=<?php echo $videoId; ?>&amp;media=https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&t=square&amp;description=<?php echo $title; ?>"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=900,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on Pinterest"
                  rel="nofollow">
                  <i class="ion ion-logo-pinterest"></i>
                </a>
              </li>
              <li class="share__item">
                <a
                  class="share__link share__linkedin"
                  href="https://api.whatsapp.com/send?text=<?php echo $title; ?> https://gean.me/watch?v=<?php echo $videoId; ?>&utm_source=whatsapp"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=900,height=500,toolbar=1,resizable=0'); return false;"
                  title="Compartilhe no WhatsApp"
                  rel="nofollow">
                  <i class="ion ion-logo-whatsapp"></i>
                </a>
              </li>
            </ul>
          </div>
        </article>
      </div>
      <!-- end post -->

      <!-- begin related posts -->
      <div class="container" id="mais">
        <section class="related-posts is-related animate">
          <div class="row">
            <div class="col col-12">
              <div class="container__inner">
                <div class="section__info">
                  <div class="section__head">
                    <h2 class="section__title">Veja também:</h2>
                    <a class="section__link" href="#/blog">
                      <a href="./channel/<?php echo $channelId; ?>" class="section__link related-tag">Veja Mais:<span> <?php echo $author; ?></span></a>
                    </a>
                  </div>
                </div>
                <div class="row">
<?php
        $rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/"></rss>');
        $channelX = $rss->addChild('channel');
        $channelX->addChild('title', $xml->title);
        $channelX->addChild('description', $authorX); // Adiciona a tag <description>
        $htmlX = '<!--inicio post relacionado-->';
        foreach ($xml->entry as $entry) {
            $videoIdX = $entry->children('yt', true)->videoId;
            $videoUrlX = 'https://gean.me/watch?v=' . $videoIdX;
            $thumbnailUrlX = 'https://img.youtube.com/vi/' . $videoIdX . '/mqdefault.jpg';
            $titleX = $entry->title;
            $descriptionX = $entry->children('media', true)->group->description;
            $pubDateX = date('d/m/Y', strtotime($entry->updated));
$htmlX .= '<div class="article col col-4 col-d-6 col-t-12">';
$htmlX .= '  <div class="article__inner">';
$htmlX .= '    <div class="article__head">';
$htmlX .= '      <time class="article__date" datetime="2024-03-13T21:00:07+00:00T12:01:35+00:00">' . $pubDateX . '</time>';
$htmlX .= '      <div class="video-icon">';
$htmlX .= '        <div class="circle pulse"></div>';
$htmlX .= '        <div class="circle">';
$htmlX .= '          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">';
$htmlX .= '            <polygon points="40,30 65,50 40,70"></polygon>';
$htmlX .= '          </svg>';
$htmlX .= '        </div>';
$htmlX .= '      </div>';
$htmlX .= '      <a class="article__image" href="' . $videoUrlX . '">';
$htmlX .= '        <img class="lazy" data-src="' . $thumbnailUrlX . '" alt="Gean Ramos - ' . $titleX . '" title="Gean Ramos - ' . $titleX . '" />';
$htmlX .= '      </a>';
$htmlX .= '    </div>';
$htmlX .= '    <div class="article__content">';
$htmlX .= '      <h2 class="article__title">';
$htmlX .= '        <a href="' . $videoUrlX . '">' . $titleX . '</a>';
$htmlX .= '      </h2>';
$htmlX .= '    </div>';
$htmlX .= '  </div>';
$htmlX .= '</div>';
        }
        $htmlX .= '<!--Fim post relacionado-->';
        echo $htmlX;
        ?>

                  

                  
				  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- end related posts -->

      <div class="container">
        <div class="row">
          <div class="col col-12">
            <!-- begin comments -->
            <div class="show-comments">
              <button class="button disqus-button" id="show-comments-button" onclick="disqus();return false;">Mostrar comentários</button>
            </div>

            <div id="disqus_thread" class="post__comments">
              <div id="disqus_empty"></div>
            </div>

            <script>
              var disqus_loaded = false;
              var disqus_shortname = "geanramos";
              var disqus_container = document.getElementById("disqus_thread");
              function disqus() {
                if (!disqus_loaded) {
                  disqus_loaded = true;
                  var e = document.createElement("script");
                  e.type = "text/javascript";
                  e.async = true;
                  e.src = "//" + disqus_shortname + ".disqus.com/embed.js";
                  (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(e);
                  // Hide the button after opening
                  document.getElementById("show-comments-button").style.display = "none";
                  // Show disqus comments
                  disqus_container.classList.add("is-open");
                }
              }
            </script>

            <noscript>
              Please enable JavaScript to view the
              <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
            </noscript>
            <!-- end comments -->
          </div>
        </div>
      </div>
    </main>
    <!-- end content -->
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:20px;top:120px;">
<!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a> | //static.addtoany.com/menu/page.js-->
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
</div>
<!-- AddToAny END -->
    <!-- begin footer -->
    <footer class="footer">
      <div class="footer__inner">
        <div class="container">
          <div class="row">
            <div class="col col-5 col-d-12">
              <div class="footer__author">
                <div class="footer__author-avatar">
                  <img class="lazy" data-src="https://2.gravatar.com/avatar/243ade88800c944ed2ba3410d0e30f50?s=105&d=retro&r=G" alt="Gean Ramos" />
                </div>
                <h3 class="footer__author-name">Gean Ramos</h3>
                <p class="footer__author-bio">Desenha, fala e escreve sobre web, ética, privacidade e desenvolvimento. Compartilho tutoriais de design, recursos gratuitos e inspiração.</p>

                <div class="social">
                  <ul class="social__list list-reset">
                    <li class="social__item">
                      <a class="social__link" href="https://twitter.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-twitter"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://facebook.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-facebook"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://instagram.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-instagram"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://pinterest.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-pinterest"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://youtube.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-youtube"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col col-6 push-1 col-d-12 push-d-0">
              <div class="footer__gallery">
                <h3 class="footer__gallery-title">Galeria</h3>

                <div class="gallery-footer">
                  <div class="gallery" style="grid-template-columns: repeat(3, auto);">
<?php
// Inicia a consulta ao feed do YouTube
$url = $channelId;
$curl = curl_init("https://www.youtube.com/feeds/videos.xml?channel_id=" . $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curl);
curl_close($curl);

// Verifica se houve falha na obtenção do conteúdo
if ($content === false) {
    echo "Falha ao obter o conteúdo da URL.";
    exit;
}

// Carrega o conteúdo XML
$xml = simplexml_load_string($content);

// Extrai o nome do autor e a data atual
$author = (string)$xml->author->name;
$dataAtual = date("Y-m-d");

// Cria o documento RSS
$rss = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/"></rss>');
$channel = $rss->addChild('channel');
$channel->addChild('title', $xml->title);
$channel->addChild('description', $author); // Adiciona a tag <description>

// Inicializa o contador
$count = 0;

// Itera sobre as entradas do feed
$html = '<!-- Início da galeria -->';
foreach ($xml->entry as $entry) {
    // Verifica se o contador atingiu 9
    if ($count >= 9) {
        break; // Interrompe o loop
    }

    // Incrementa o contador
    $count++;

    // Extrai informações da entrada
    $videoId = $entry->children('yt', true)->videoId;
    $thumbnailUrl = 'https://images.weserv.nl/?url=img.youtube.com/vi/' . $videoId . '/sddefault.jpg&w=1280&h=720&output=jpg&q=80&t=square';
    $title = $entry->title;
    $description = $entry->children('media', true)->group->description;
    $pubDate = date('d/m/Y', strtotime($entry->updated));

    // Adiciona a imagem à galeria
    $html .= '<div class="gallery__image">';
    $html .= '<img src="' . $thumbnailUrl . '" max-width="172.66" max-height="97.11" alt="Gean Ramos - ' . $title . '" title="Gean Ramos - ' . $title . '" loading="lazy" />';
    $html .= '</div>';
}
$html .= '<!-- Fim da galeria -->';

// Exibe a galeria
echo $html;
?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer__info">
        <div class="container">
          <div class="row">
            <div class="col col-12">
              <div class="footer__info-box">
                <div class="copyright">2004 - <span id="footer-date"></span> &copy; Feito com <i class="icon ion-md-heart"></i> por <a href="https://instagram.com/geanramus">@GeanRamus</a>.</div><style>.ion-md-heart:before { content: "\f308"; color: red; font-size: large; }</style>
                <script>document.querySelector("#footer-date").innerText = new Date().getFullYear();</script>
                <div class="top" title="Top"><i class="ion ion-ios-arrow-up"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/common.js"></script>
	<a id="geanramos-com-br-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?text=<?php echo $title; ?> https://gean.me/watch?v=<?php echo $videoId; ?>&utm_source=whatsapp">
<div class="rwb-tooltip">APERTE AQUI!</div>
<img src="https://cdn.jsdelivr.net/gh/geanramos/pudimperfeito/extra/whatsapp-icon.svg">
</a>
<script src="https://cdn.jsdelivr.net/gh/geanramos/files/home-assets/puritym/js/page.js"></script>	
  </body>
</html>