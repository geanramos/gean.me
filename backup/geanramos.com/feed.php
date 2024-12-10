<?php
/*
 * RSS Script File for YOURLS 1.5+ - v 1.2
 * Put this file in your YOURLS root directory
 * If you want it to be public, remove the line
 * with yourls_maybe_require_auth();
 *
 */

require_once( dirname(__FILE__).'/includes/load-yourls.php' );
// yourls_maybe_require_auth(); // Remove this line if your YOURLS is set to private and you want the RSS feed to be public

$items = yourls_api_stats( 'last', 200 );
echo '<?'.'xml version="1.0" encoding="UTF-8" ?>';
?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<title>Ultimos links do <?php echo YOURLS_SITE; ?></title>
<link><?php echo YOURLS_SITE; ?></link>
<description>O encurtador de URLs <?php echo YOURLS_SITE; ?> é um serviço que pegar URLs longas e complicadas de decorar e as converte em URLs com pouqíssimos caracteres</description>
<atom:link href="<?php echo YOURLS_SITE; ?>/feed.php" rel="self" type="application/rss+xml" />
<generator>GeanRamos.com - v<?php echo YOURLS_VERSION; ?></generator>

<language>pt_BR</language>
<?php foreach( $items['links'] as $item ) { ?>
<item>
	<title><?php echo yourls_esc_html( $item['title'] ); ?></title>
	<description><?php echo htmlentities( $item['url'] ); ?></description>
	<pubDate><?php echo date('D, d M Y H:i:s O', strtotime($item['timestamp']) ); ?></pubDate>  
	<link><?php echo $item['shorturl']; ?></link>  
	<guid isPermaLink="true"><?php echo $item['shorturl']; ?></guid>
</item>
<?php } ?>
</channel>
</rss>