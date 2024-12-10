
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>GO2 - Sitemap</title>
	<link rel="icon" href="https://gean.me/favicon.ico" sizes="32x32" />
	<link rel="icon" href="https://gean.me/favicon.ico" sizes="192x192" />
	<link rel="apple-touch-icon-precomposed" href="https://gean.me/favicon.ico" />
	<meta name="msapplication-TileImage" content="https://gean.me/favicon.ico" />
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700%2C400italic%2C700italic&#038;ver=4.9.11' type='text/css' media='all' />
	<style type="text/css">body {font-family: Source Sans Pro Light, Courier New;}p {line-height: 0.7rem;}h1.titulo {font-size: 1.6rem;line-height: 1.4;font-weight: 400}a:link {font-size: 0.9em;font-weight: 300;text-transform: uppercase;text-decoration: none;}a:visited {color: #f00;}a:hover {color: #dd00a9;text-decoration: underline;}.container {max-width: 450px;} #footer { text-align: left; padding: 0; margin: 0 auto; width: 390px; clear: both; line-height: 1.5; font-size: 80%; color: #141412; border: none; }</style>
<body>
<center>
<div align="left" class="container">
<h1 class="titulo" align="left">GO2 - Sitemap</h1>
<ol>

            <?php
            // Carrega o conteúdo do arquivo JSON
            $json = file_get_contents('urls.json');

            // Decodifica o JSON para um array associativo
            $urls = json_decode($json, true);

            // Verifica se a decodificação foi bem-sucedida
            if ($urls !== null) {
                // Itera sobre cada URL e exibe os dados
                foreach ($urls as $url) {
					echo '<li><p>' . $url['keyword'] . ' - <a href="https://gean.me/go2/?r=' . $url['keyword'] . '" target="_blank" title="' . $url['url'] . '">' . $url['title'] . '</a></p></li>';
                }
            } else {
                echo '<li>Nenhuma URL encontrada.</li>';
            }
            ?>

        </ol>
</div>
</center>
<br>
<div id="footer" role="contentinfo">
	<p>
		<a href="criar.html">criar</a> | <a href="../../feed.php">Feed</a> | <a href="../../rss.php">RSS</a> | <a href="../../xml.php">xml</a> | <a href="../../sitemap.php">sitemap</a>.
	</p>
</div>
<noscript></body></noscript>
</html>