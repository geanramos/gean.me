<?php
   require_once( dirname(__FILE__).'/includes/load-yourls.php' );
   // yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public
   $items = yourls_api_stats( 'last', 5 );
   echo '';
   ?><!DOCTYPE html>
<html lang="pt" class="link-html">
    <head>
        <title>Bia Santos | biasantos.net</title>
        <!--<base href="https://geanramos.com/" />-->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://geanramos.com/favicon.png" rel="shortcut icon" />
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet" />
        <link href="https://img.geanramos.com/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="https://img.geanramos.com/css/custom.css" rel="stylesheet" media="screen" />
        <link href="https://img.geanramos.com/css/link-custom.css" rel="stylesheet" media="screen" />
        <link href="https://img.geanramos.com/css/animate.min.css" rel="stylesheet" media="screen" />
        <link rel="canonical" href="https://geanramos.com/links" />
    </head>
    <meta property="og:image" itemprop="image" content="https://i1.wp.com/www.biasantos.net/img/biasantosnet2.png?resize=500,500" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <link rel="icon" type="image/png" href="https://geanramos.com/favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="https://geanramos.com/favicon.ico" />
    <body class="link-body link-body-background-one" style="">
        <div class="container animated fadeIn">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-8 link-content">
                    <header class="d-flex flex-column align-items-center" style="color: #fff;">
                        <img id="image" src="https://i1.wp.com/www.biasantos.net/img/biasantosnet2.png?resize=125,125" alt="Bia Santos" class="link-image" />
                        <div class="d-flex flex-row align-items-center mt-4">
                            <h1 id="title">Bia Santos</h1>

                                                <span data-toggle="tooltip" title="Verificado" class="link-verified ml-1"><i class="fa fa-check-circle fa-1x"></i></span>
                                            </div>

                    <p id="description">BiaSantos.net</p>
                </header>

                <main id="links" class="mt-4">
<div data-link-id="638661">
                            <div class="my-3 embed-responsive embed-responsive-16by9 link-iframe-round">
<?php
			$id = $_GET["v"];
			echo " <iframe class=\"embed-responsive-item\" scrolling=\"no\" frameborder=\"no\" src=\"https://sinalpublico.com/player3/server5http2hlb.php?vid=$id\"></iframe>";
			?></div>
                        </div>
                        <div data-link-id="412893">
                            <div class="my-3">
    <a href="//geanramos.com/#clube" data-location-url="bFqmhBzxYY" class="btn btn-block btn-primary link-btn link-btn-rounded animated infinite pulse delay-2s" style="background: #fff;color: #000">Clube Privado</a>
</div>
                    <?php foreach( $items['links'] as $item ) { ?></div>
                        <div data-link-id="732336">
                            <div class="my-3">
                                <a href="<?php echo $item['shorturl']; ?>" data-location-url="aTeN9omRPo" class="btn btn-block btn-primary link-btn link-btn-rounded animated infinite false delay-2s" style="background: #fff; color: #000;"><?php echo $item['shorturl']; ?></a>
                            </div>  <?php } ?>
                        </div>
                        
                    </main>
                    <footer class="link-footer">
<a id="branding" href="https://geanramos.com/" style="color: #fff">Feito com <i class="fas fa-heart mr-1"></i>por @GeanRamus</a> <p></footer>
                </div>
            </div>
        </div>
    </body>
    <script src="https://img.geanramos.com/js/jquery.min.js"></script>
    <script src="https://img.geanramos.com/js/popper.min.js"></script>
    <script src="https://img.geanramos.com/js/bootstrap.min.js"></script>
    <script src="https://img.geanramos.com/js/main.js"></script>
    <script src="https://img.geanramos.com/js/functions.js"></script>
    <script src="https://img.geanramos.com/js/fontawesome.min.js"></script>
</html>