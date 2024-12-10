<?php
   require_once( dirname(__FILE__).'/includes/load-yourls.php' );
   // yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public
   $items = yourls_api_stats( 'last', 50 );
   echo '';
   ?><!DOCTYPE html> 
<html lang="pt" class="link-html">
  <head>
    <title>Gean Ramos | Links</title>
    <!--<base href="https://geanramos.com/">--> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://geanramos.com/favicon.png" rel="shortcut icon" />
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="./themes/altum/assets/css/bootstrap.min.css?v=4402" rel="stylesheet" media="screen">
    <link href="./themes/altum/assets/css/custom.css?v=4402" rel="stylesheet" media="screen">
    <link href="./themes/altum/assets/css/link-custom.css?v=4402" rel="stylesheet" media="screen">
    <link href="./themes/altum/assets/css/animate.min.css?v=4402" rel="stylesheet" media="screen">
    <link rel="canonical" href="https://geanramos.com/link2" />
  </head>
  <meta property="og:image" itemprop="image" content="https://i1.wp.com/geanramos.com/favicon.png">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="200">
  <meta property="og:image:height" content="200">
  <link rel="icon" type="image/png" href="https://geanramos.com/favicon.png" />
  <link rel="shortcut icon" type="image/png" href="https://geanramos.com/favicon.ico" />
  <body class="link-body " style="background-image: linear-gradient(135deg, #F26426 10%, #F26426 100%);">
    <div class="container animated fadeIn">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-md-8 link-content">
          <header class="d-flex flex-column align-items-center" style="color: #fff">
            <img id="image" src="https://2.gravatar.com/avatar/243ade88800c944ed2ba3410d0e30f50?s=125&d=retro&r=G" alt="Gean Ramos" class="link-image" /> 
            <div class="d-flex flex-row align-items-center mt-4">
              <h1 id="title">Gean Ramos | Marketing Digital</h1>
              <span data-toggle="tooltip" title="Verificado" class="link-verified ml-1"><i class="fa fa-check-circle fa-1x"></i></span> 
            </div>
            <p id="description">Estratégias para Você Criar <br> O Estilo de Vida dos Seus Sonhos!</p>
          </header>
          <main id="links" class="mt-4">
          <?php foreach( $items['links'] as $item ) { ?>
            <div data-link-id="20220506">
              <div class="my-3">
              <a href="<?php echo $item['shorturl']; ?>" class="btn btn-block btn-primary link-btn link-btn-round animated infinite false delay-2s" style="background: #fff;color: #605E5E"><?php echo yourls_esc_html( $item['title'] ); ?></a>
              </div>
            </div>
            <?php } ?>
          </main>
          <footer class="link-footer">
            <a id="branding" href="https://www.instagram.com/geanramus/" style="color: #fff">Criado por @GeanRamus</a>
            <p>
            <p> 
          </footer>
        </div>
      </div>
    </div>
  </body>
  <script src="./themes/altum/assets/js/jquery.min.js?v=4402"></script> <script src="./themes/altum/assets/js/popper.min.js?v=4402"></script> <script src="./themes/altum/assets/js/bootstrap.min.js?v=4402"></script> <script src="./themes/altum/assets/js/main.js?v=4402"></script> <script src="./themes/altum/assets/js/functions.js?v=4402"></script> <script src="./themes/altum/assets/js/fontawesome.min.js?v=4402"></script> 
</html>
