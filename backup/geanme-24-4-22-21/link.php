<?php
   require_once( dirname(__FILE__).'/includes/load-yourls.php' );
   // yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public
   $items = yourls_api_stats( 'last', 100 );
   echo '';
   ?>
<!DOCTYPE html>
<html lang="pt" class="link-html">
   <head>
      <title>Gean Ramos</title>
      <!--<base href="https://geanramos.com/">-->
      <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
      <meta content="ie=edge" http-equiv="x-ua-compatible">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="application-name" content="Gean Ramos">
      <link rel="apple-touch-icon" sizes="57x57" href="https://geanramos.com/favicon.png?v=57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="https://geanramos.com/favicon.png?v=60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="https://geanramos.com/favicon.png?v=72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="https://geanramos.com/favicon.png?v=76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="https://geanramos.com/favicon.png?v=114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="https://geanramos.com/favicon.png?v=120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="https://geanramos.com/favicon.png?v=144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="https://geanramos.com/favicon.png?v=152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="https://geanramos.com/favicon.png?v=180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="https://geanramos.com/favicon.png?v=android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="https://geanramos.com/favicon.png?v=favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="https://geanramos.com/favicon.png?v=favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="https://geanramos.com/favicon.png?v=favicon-16x16.png">
      <link rel="manifest" href="https://geanramos.com/favicon.png?v=manifest.json">
      <link href="https://geanramos.com/favicon.png?v=favicon.ico" rel="shortcut icon">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="https://geanramos.com/favicon.png?v=ms-icon-144x144.png">
      <meta name="theme-color" content="#e22b79">
      <link rel="preload" href="https://linklist.bio/assets/css/font.css" as="style">
      <link href="https://linklist.bio/assets/css/bootstrap.min.css?v=1.7.0" rel="stylesheet" media="screen">
      <link href="https://linklist.bio/assets/css/custom-styles.css?v=1.7.0" rel="stylesheet" media="screen">
      <link href="https://linklist.bio/assets/css/link-custom.css?v=1.7.0" rel="stylesheet" media="screen">
      <link href="https://linklist.bio/assets/css/animate.min.css?v=1.7.0" rel="stylesheet" media="screen">
      <link href="https://linklist.bio/assets/css/all.min.css?v=1.7.0" rel="stylesheet" media="screen">
      <meta name="description" content="Nomade Digital">
      <meta property="og:url" content="https://geanramos.com/">
      <meta property="og:type" content="website">
      <meta property="og:title" content="Gean Ramos | Links">
      <meta property="og:site_name" content="Gean Ramos">
      <meta property="og:description" content="Nomade Digital">
      <meta property="og:image:url" content="https://i1.wp.com/media.linklist.bio/avatars/2882ced24e831d1e762f2e267c52018a.jpeg?resize=150,150">
      <meta property="og:image:width" content="200">
      <meta property="og:image:height" content="200">
      <meta name="twitter:card" content="summary">
      <meta name="twitter:site" content="@geanramos">
      <meta name="twitter:domain" content="geanramos">
      <meta name="twitter:url" content="https://geanramos.com">
      <meta name="twitter:title" content="Gean Ramos | Links">
      <meta name="twitter:description" content="Nomade Digital">
      <meta name="twitter:image" content="https://media.linklist.bio/avatars/2882ced24e831d1e762f2e267c52018a.jpeg">
      <script src="https://linklist.bio/assets/js/libraries/jquery.min.js?v=1.7.0"></script>
      <script src="https://linklist.bio/assets/js/libraries/popper.min.js?v=1.7.0"></script>
      <script src="https://linklist.bio/assets/js/libraries/bootstrap.min.js?v=1.7.0"></script>
   </head>
   <body class="link-body link-body-background-five" style="">
      <div class="container animated fadeIn">
         <div class="row d-flex justify-content-center text-center">
            <div class="col-md-8 link-content">
               <header class="d-flex flex-column align-items-center" style="color: #FFFFFF">
                  <img
                     id="image"
                     src="https://i1.wp.com/media.linklist.bio/avatars/2882ced24e831d1e762f2e267c52018a.jpeg?resize=125,125"
                     alt="Avatar"
                     class="link-image"
                     onerror="this.style = 'display: none';"
                     />
                  <div class="d-flex flex-row align-items-center mt-4 mw-100">
                     <h2 id="title">Gean Ramos</h2>
                  </div>
                  <p id="description">Nomade Digital</p>
               </header>
               <main id="links">
                  <?php foreach( $items['links'] as $item ) { ?>
                  <div data-link-id="917896">
                     <div class="my-3">
                        <a href="<?php echo $item['shorturl']; ?>" target="_blank" title="<?php echo yourls_esc_html( $item['title'] ); ?>" class="btn btn-block btn-secondary link-btn link-btn-rounded" style="background: #FFFFFF;color: #000000"><?php echo $item['shorturl']; ?></a>
                     </div>
                  </div>
                  <?php } ?>
               </main>
            </div>
         </div>
      </div>
      <footer class="mt-auto mb-2 d-flex justify-content-center align-items-center flex-column">
         <section>
            <a id="branding" class="footer-wicon" href="https://gean.me/#vip" style="color: #FFFFFF"><img src="https://www.google.com/s2/favicons?domain=https://gean.me/#vip"class="img-fluid mr-2" />Lista Vip</a>
         </section>
      </footer>
   </body>
</html>