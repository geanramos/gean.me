<?php
date_default_timezone_set('America/Sao_Paulo');
$dateString = date('D, d M Y H:i:s O');

$id = $_GET["p"];

$api_url = "https://www.receiteria.com.br/wp-json/oembed/1.0/embed?url=https://www.receiteria.com.br/receita/$id/";

$response = file_get_contents($api_url);
$data = json_decode($response, true);

header('Content-Type: application/rss+xml; charset=UTF-8');

if ($data) {
    $author_name = $data['author_name'];
    $title = $data['title'];
    $thumbnail_url = str_replace('https://www.receiteria.com.br/wp-content/uploads/', 'https://gean.me/cdn/400x225/', $data['thumbnail_url']);
    $description = str_replace('receiteria', 'gean', $data['description']);
?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">
<channel>
<title>U1M Receitas</title>
<atom:link href="https://gean.me/receita/feed?p=<?php echo $id; ?>" rel="self" type="application/rss+xml"/>
<link>https://gean.me/<?php echo $id; ?>/</link>
<description>Arroz e Risotos ,Aves ,Bebidas ,Bolos ,Carnes ,Doces e Sobremesas ,Entradas e Petiscos ,Lanches e Salgados ,Massas ,Pães ,Saladas e Acompanhamentos ,Sopas e Caldos pra quem ama comida</description>
<lastBuildDate>Thu, 18 Apr 2024 17:43:34 +0000</lastBuildDate>
<language>pt-BR</language>
<sy:updatePeriod>	hourly	</sy:updatePeriod>
<sy:updateFrequency>	1	</sy:updateFrequency>
<generator>https://wordpress.org/?v=6.4.4</generator>
<item>
</item>
<item>
<title><?php echo $title; ?></title>
<link>https://gean.me/<?php echo $id; ?>/</link>
<comments>https://gean.me/<?php echo $id; ?>/#features4-0</comments>
<dc:creator><![CDATA[<?php echo $author_name; ?>]]></dc:creator>
<pubDate><?php echo $dateString; ?></pubDate>
<category><![CDATA[<?php echo $title; ?>]]></category>
<category><![CDATA[Arroz e Risotos]]></category>
<category><![CDATA[Aves]]></category>
<category><![CDATA[Bebidas]]></category>
<category><![CDATA[Bolos]]></category>
<category><![CDATA[Carnes]]></category>
<category><![CDATA[Doces e Sobremesas]]></category>
<category><![CDATA[Entradas e Petiscos]]></category>
<category><![CDATA[Lanches e Salgados]]></category>
<category><![CDATA[Massas]]></category>
<category><![CDATA[Pães]]></category>
<category><![CDATA[Saladas e Acompanhamentos]]></category>
<category><![CDATA[Sopas e Caldos]]></category>
<guid isPermaLink="false">https://gean.me/<?php echo $id; ?>/</guid>
<description><![CDATA[<img width="400" height="261" src="<?php echo $thumbnail_url; ?>?resize=400,261" style="display: block;margin: auto;margin-bottom: 5px;max-width: 100%;border-radius: 8px;" class="webfeedsFeaturedVisual wp-post-image" alt="<?php echo $title; ?>" style="display: block; margin: auto; margin-bottom: 5px;max-width: 100%;" decoding="async" loading="lazy" /><p><h2><?php echo $title; ?><h2></b><p><?php echo $description; ?></p>
<p>A receita <a href="https://gean.me/<?php echo $id; ?>/"><?php echo $title; ?></a> apareceu primeiro em <a href="https://gean.me/">U1M Receitas</a>.</p>
]]></description>
<content:encoded><![CDATA[<img width="400" height="261" src="<?php echo $thumbnail_url; ?>?resize=400,261" class="webfeedsFeaturedVisual wp-post-image" alt="<?php echo $title; ?>" style="display: block;margin: auto;margin-bottom: 5px;max-width: 100%;border-radius: 8px;" decoding="async" loading="lazy" /><p><h2><?php echo $title; ?></h2></b><p><?php echo $description; ?></p>
<p>A receita <a href="https://gean.me/<?php echo $id; ?>/"><?php echo $title; ?></a> apareceu primeiro em <a href="https://gean.me/">U1M Receitas</a>.</p>
]]></content:encoded>
</item>
</channel>
</rss>
<?php
} else {
    echo "Erro ao obter os dados do Feed.";
}
?>