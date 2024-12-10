<?php
require_once( dirname(__FILE__).'/includes/load-yourls.php' );
// yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public
$items = yourls_api_stats( 'last', 100 );
echo '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Sitemap - <?php echo YOURLS_SITE; ?></title>
	<link rel="icon" href="<?php echo YOURLS_SITE; ?>/files/favicon.ico" sizes="32x32" />
	<link rel="icon" href="<?php echo YOURLS_SITE; ?>/files/favicon.ico" sizes="192x192" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo YOURLS_SITE; ?>/files/favicon.ico" />
	<meta name="msapplication-TileImage" content="<?php echo YOURLS_SITE; ?>/files/favicon.ico" />
	<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700%2C400italic%2C700italic&#038;ver=4.9.11' type='text/css' media='all' />
	<style type="text/css">body {font-family: Source Sans Pro Light, Courier New;}p {line-height: 0.7rem;}h1.titulo {font-size: 1.6rem;line-height: 1.4;font-weight: 400}a:link {font-size: 0.9em;font-weight: 300;text-transform: uppercase;text-decoration: none;}a:visited {color: #f00;}a:hover {color: #dd00a9;text-decoration: underline;}.container {max-width: 450px;} #footer { text-align: left; padding: 0; margin: 0 auto; width: 390px; clear: both; line-height: 1.5; font-size: 80%; color: #141412; border: none; }</style>
</head>
<body>
<center>
<div align="left" class="container">
<h1 class="titulo" align="left">Sitemap - <?php echo YOURLS_SITE; ?></h1>
<ol>
<?php foreach( $items['links'] as $item ) { ?>
<li><p><a href="<?php echo $item['shorturl']; ?>" target="_blank" title="<?php echo htmlentities( $item['url'] ); ?>"><?php echo yourls_esc_html( $item['title'] ); ?></a></p></li>
<?php } ?>
</ol>
</div>
</center>
<br>
<div id="footer" role="contentinfo">
	<p>
		<a href="<?php echo YOURLS_SITE; ?>/">HOME</a> | <a href="feed.php">Feed</a> | <a href="rss.php">RSS</a> | <a href="xml.php">xml</a> | <a href="sitemap.php">sitemap</a>.
	</p>
</div>
<noscript></body></noscript>
</html>