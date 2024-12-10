<?php
   require_once( dirname(__FILE__).'/includes/load-yourls.php' );
   // yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public
   $items = yourls_api_stats( 'last', 6 );
   echo '';
   ?><!DOCTYPE html>
<html lang="pt" class="link-html">
  <head>
    <title>Bia Santos | biasantos.net</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://www.biasantos.net/favicon.png" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="./themes/altum/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="./themes/altum/assets/css/custom.css" rel="stylesheet" media="screen">
    <link href="./themes/altum/assets/css/link-custom.css" rel="stylesheet" media="screen">
    <link href="./themes/altum/assets/css/animate.min.css" rel="stylesheet" media="screen">
	<style type="text/css"> btn btn-block btn-primary link-btn link-btn-rounded animated infinite false delay-2s {background: #D0B27C; color: #000000;}</style>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <link rel="canonical" href="https://www.biasantos.net/" />
  </head>
  <meta property="og:image" itemprop="image" content="https://i1.wp.com/biasantos.net/img/biasantosnet2.png?resize=125,125">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="200">
  <meta property="og:image:height" content="200">
  <link rel="icon" type="image/png" href="https://www.biasantos.net/favicon.png" />
  <link rel="shortcut icon" type="image/png" href="https://i1.wp.com/biasantos.net/img/biasantosnet.png?resize=125,125" />
  <body class="link-body " style="background: #000000;">
    <div class="container animated fadeIn">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-md-8 link-content">
          <header class="d-flex flex-column align-items-center" style="color: #D0B27C">
            <img id="image" src="https://i1.wp.com/biasantos.net/img/biasantosnet2.png?resize=125,125" alt="Bia Santos" class="link-image" />
            <div class="d-flex flex-row align-items-center mt-4">
              <h1 id="title">Bia Santos</h1>
              <span data-toggle="tooltip" title="Verificado" class="link-verified ml-1"><i class="fa fa-check-circle fa-1x"></i></span>
            </div>
            <p id="description">Imagine uma nova história <br>para sua vida e acredite nela.</p>
          </header>
          <main id="links" class="mt-4">

            <div data-link-id="112233">
              <div class="my-3 embed-responsive embed-responsive-16by9 link-iframe-round">
                <iframe class="embed-responsive-item" scrolling="no" frameborder="no" src="https://www.youtube.com/embed/N7wfcAa3MCw?si=jd14WnWYT3Uz3imw"></iframe>
              </div>
            </div>
			<?php foreach( $items['links'] as $item ) { ?>
            <div data-link-id="220509">
              <div class="my-3">
                <a href="<?php echo $item['shorturl']; ?>" class="btn btn-block btn-primary link-btn link-btn-rounded animated infinite false delay-2s" style="background: #D0B27C;color: #000000"><i class="fas fa-link mr-1"></i><?php echo yourls_esc_html( $item['title'] ); ?></a>
              </div>
            </div>
			<?php } ?>
          </main>
          <footer class="link-footer">
            <a id="branding" href="https://www.biasantos.net/" style="color: #D0B27C">BiaSantos.net</a><br><br>
          </footer>
        </div>
      </div>
    </div>
  </body>
  <script src="./themes/altum/assets/js/jquery.min.js"></script>
  <script src="./themes/altum/assets/js/popper.min.js"></script>
  <script src="./themes/altum/assets/js/bootstrap.min.js"></script>
  <script src="./themes/altum/assets/js/main.js"></script>
  <script src="./themes/altum/assets/js/functions.js"></script>
  <script src="./themes/altum/assets/js/fontawesome.min.js"></script>
  <script>
</html>
