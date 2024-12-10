<?php
require_once( dirname(__FILE__).'/includes/load-yourls.php' );
// yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public
$items = yourls_api_stats( 'last', 100 );
echo '';
?>
<!DOCTYPE html>
<html lang="pt" class="link-html">
   <head>
      <title>Gean Ramos - <?php echo YOURLS_SITE; ?>/link</title>
      <!-- <base href="https://geanramos.com/"> -->
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="./uploads/favicon/21804bd4e12f6a4baf7f395b476589a9.png" rel="shortcut icon" />
      <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
      <link href="./themes/altum/assets/css/bootstrap.min.css?v=4402" rel="stylesheet" media="screen">
      <link href="./themes/altum/assets/css/custom.css?v=4402" rel="stylesheet" media="screen">
      <link href="./themes/altum/assets/css/link-custom.css?v=4402" rel="stylesheet" media="screen">
      <link href="./themes/altum/assets/css/animate.min.css?v=4402" rel="stylesheet" media="screen">
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23205651-1"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());         
         gtag('config', 'UA-23205651-1');
      </script>
      <!-- Facebook Pixel Code -->
      <!--<script>
         !function(f,b,e,v,n,t,s)
         {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
             n.callMethod.apply(n,arguments):n.queue.push(arguments)};
             if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
             n.queue=[];t=b.createElement(e);t.async=!0;
             t.src=v;s=b.getElementsByTagName(e)[0];
             s.parentNode.insertBefore(t,s)}(window, document,'script',
             'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', 'xxxxxxxxxx');
         fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=992374087597972&ev=PageView&noscript=1"/></noscript>-->
      <!-- End Facebook Pixel Code -->
      <link rel="canonical" href="<?php echo YOURLS_SITE; ?>" />
   </head>
   <meta property="og:image" itemprop="image" content="https://2.gravatar.com/avatar/243ade88800c944ed2ba3410d0e30f50?s=500&d=retro&r=G">
   <meta property="og:image:type" content="image/jpeg">
   <meta property="og:image:width" content="200">
   <meta property="og:image:height" content="200">
   <link rel="icon" type="image/png" href="https://cdn.gean.me/ico/favicon-16x16.png" />
   <link rel="shortcut icon" type="image/png" href="https://cdn.gean.me/ico/favicon-16x16.png" />
   <link href="https://cdn.gean.me/ico/favicon.ico" rel="icon" type="image/x-icon" />		
   <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.gean.me/ico/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="https://cdn.gean.me/ico/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.gean.me/ico/favicon-16x16.png">

   <body class="link-body link-body-background-one" style="">
      <div class="container animated fadeIn">
         <div class="row d-flex justify-content-center text-center">
            <div class="col-md-8 link-content">
               <header class="d-flex flex-column align-items-center" style="color: #fff">
                  <img id="image" src="https://2.gravatar.com/avatar/243ade88800c944ed2ba3410d0e30f50?s=125&d=retro&r=G" alt="Gean Ramos" class="link-image" />
                  <div class="d-flex flex-row align-items-center mt-4">
                     <h1 id="title">@geanramus</h1>
                     <span data-toggle="tooltip" title="Verificado" class="link-verified ml-1"><i class="fa fa-check-circle fa-1x"></i></span>
                  </div>
                  <p id="description">Marketing Digital por Gean Ramos</p>
               </header>
               <main id="links" class="mt-4">
			   <?php foreach( $items['links'] as $item ) { ?>
                  <div data-link-id="266796">
                     <div class="my-3">
                        <a href="<?php echo $item['shorturl']; ?>" target="_blank" title="<?php echo yourls_esc_html( $item['title'] ); ?>" data-location-url="210LdnsHK3" class="btn btn-block btn-primary link-btn link-btn-rounded animated infinite false delay-2s" style="background: #fff;color: #8400FF">
                        <i class="fas fa-link mr-1"></i>
                        <?php echo $item['shorturl']; ?>    </a>
                     </div>
                  </div>
				  <?php } ?>
                  
               </main>
               <footer class="link-footer">
                  <a id="branding" href="<?php echo YOURLS_SITE; ?>/" style="color: #fff">home</a> | <a id="branding" href="<?php echo YOURLS_SITE; ?>/feed.php" style="color: #fff">feed</a> | <a id="branding" href="<?php echo YOURLS_SITE; ?>/rss.php" style="color: #fff">rss</a> | <a id="branding" href="<?php echo YOURLS_SITE; ?>/xml.php" style="color: #fff">xml</a> | <a id="branding" href="https://feeds.feedburner.com/geanme" style="color: #fff">sitemap</a>.</a><br><br><br>
               </footer>
            </div>
         </div>
      </div>
   </body>

   <script src="./themes/altum/assets/js/jquery.min.js?v=4402"></script>
   <script src="./themes/altum/assets/js/popper.min.js?v=4402"></script>
   <script src="./themes/altum/assets/js/bootstrap.min.js?v=4402"></script>
   <script src="./themes/altum/assets/js/main.js?v=4402"></script>
   <script src="./themes/altum/assets/js/functions.js?v=4402"></script>
   <script src="./themes/altum/assets/js/fontawesome.min.js?v=4402"></script>

</html>