<?php
$cat = $_GET['receitas'];

date_default_timezone_set('America/Sao_Paulo');
$dateString = date('D, d M Y H:i:s O');

// URL da página que contém os dados
$url = 'https://gean.me/receita/especial/' . $cat . '.html';

// Obter o conteúdo HTML da página
$html = file_get_contents($url);

// Extrair o título do feed (usando o conteúdo do h2)
preg_match('/<h2>(.*?)<\/h2>/s', $html, $title_matches);
$title = isset($title_matches[1]) ? trim(strip_tags($title_matches[1])) : 'Receitas de Sopas e Caldos';

// Inicializar o conteúdo do feed RSS
$rss_feed = '<?xml version="1.0" encoding="UTF-8"?>';
$rss_feed .= '<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:georss="http://www.georss.org/georss" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#">';
$rss_feed .= '<channel>';
$rss_feed .= '<title>' . htmlspecialchars($title) . '</title>';
$rss_feed .= '<atom:link href="https://gean.me/receita/rss2?receitas=' . $cat . '" rel="self" type="application/rss+xml"/>';
$rss_feed .= '<link>' . htmlspecialchars($url) . '</link>';
$rss_feed .= '<description>U1M ' . htmlspecialchars($title) . '.</description>';
$rss_feed .= '<lastBuildDate>' . $dateString . '</lastBuildDate>';
$rss_feed .= '<language>pt-BR</language>';
$rss_feed .= '<sy:updatePeriod>	hourly	</sy:updatePeriod>';
$rss_feed .= '<sy:updateFrequency>	1	</sy:updateFrequency>';
$rss_feed .= '<generator>https://wordpress.org/?v=6.4.4</generator>';

// Extrair os itens do feed (usando os elementos dentro de <ol><li><a>)
preg_match_all('/<ol[^>]*>(.*?)<\/ol>/s', $html, $ol_matches);
if (isset($ol_matches[1][0])) {
    preg_match_all('/<li[^>]*><a[^>]*href=[\'"](.*?)[\'"][^>]*>(.*?)<\/a><\/li>/s', $ol_matches[1][0], $item_matches, PREG_SET_ORDER);

    foreach ($item_matches as $item) {
        $link = $item[1];
        $title = str_replace('-', ' ', basename($link)); // Remover traços e substituir por espaços

        // Adicionar cada item ao feed RSS
        $rss_feed .= '<item>';
        $rss_feed .= '<title>' . htmlspecialchars($title) . '</title>';
        $rss_feed .= '<link>' . htmlspecialchars($link) . '</link>';
        $rss_feed .= '<comments>' . htmlspecialchars($link) . '#features4-0</comments>';
        $rss_feed .= '<dc:creator><![CDATA[Gean Ramos]]></dc:creator>';
        $rss_feed .= '<pubDate>' . date('D, d M Y H:i:s O') . '</pubDate>';
        $rss_feed .= '<category><![CDATA[' . htmlspecialchars($title) . ']]></category>';
        $rss_feed .= '<guid isPermaLink="false">' . htmlspecialchars($link) . '?v=2</guid>';
        $rss_feed .= '<description><![CDATA[<img width="400" height="261" src="https://i1.wp.com/cdn.jsdelivr.net/gh/geanramos/files/img/og_noimg.png?resize=400,261" class="webfeedsFeaturedVisual wp-post-image" alt="' . htmlspecialchars($title) . '" style="display: block;margin: auto;margin-bottom: 5px;max-width: 100%;border-radius: 8px;" decoding="async" loading="lazy" /><p><h2>' . htmlspecialchars($title) . '</h2></b><p> Aprenda a preparar esta deliciosa receita de ' . htmlspecialchars($title) . '. Uma ótima opção para o dia a dia. Confira!</p><p> A receita <a href="' . htmlspecialchars($link) . '">' . htmlspecialchars($title) . '</a> apareceu primeiro em <a href="https://gean.me/">U1M Receita</a>.</p>]]></description>';
        $rss_feed .= '<content:encoded><![CDATA[<img width="400" height="261" src="https://i1.wp.com/cdn.jsdelivr.net/gh/geanramos/files/img/og_noimg.png?resize=400,261" class="webfeedsFeaturedVisual wp-post-image" alt="' . htmlspecialchars($title) . '" style="display: block;margin: auto;margin-bottom: 5px;max-width: 100%;border-radius: 8px;" decoding="async" loading="lazy" /><p><h2>' . htmlspecialchars($title) . '</h2></b><p> Aprenda a preparar esta deliciosa receita de ' . htmlspecialchars($title) . '. Uma ótima opção para o dia a dia. Confira!</p><p> A receita <a href="' . htmlspecialchars($link) . '">' . htmlspecialchars($title) . '</a> apareceu primeiro em <a href="https://gean.me/">U1M Receita</a>.</p>]]></content:encoded>';
        $rss_feed .= '</item>';
    }
}

// Finalizar o feed RSS
$rss_feed .= '</channel>';
$rss_feed .= '</rss>';

// Definir o cabeçalho HTTP para indicar que é um feed RSS XML
header('Content-Type: application/rss+xml; charset=UTF-8');

// Exibir o feed RSS gerado
echo $rss_feed;
?>
