<?php
// Obtém o valor do parâmetro 'q' da URL
$id = $_GET["q"];
?>
<!--

><(((('>
╔═╗╔═╗╔═╗╔╗╔ ╔╦╗╔═╗
║ ╦║╣ ╠═╣║║║ ║║║║╣ 
╚═╝╚═╝╩ ╩╝╚╝o╩ ╩╚═╝
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>U1M Busca - Tudo sobre: <?php echo $id; ?></title>
	<meta name="description" content="O U1M Busca é um serviço de pesquisa que proporciona o fácil acesso à informação.">
	<meta property="og:locale" content="pt_BR">
	<meta property="og:url" content="https://gean.me/busca">
	<meta property="og:title" content="U1M Busca | Tudo sobre: <?php echo $id; ?>">
	<meta property="og:site_name" content="U1M Busca">
	<meta property="og:description" content="O U1M Busca é um serviço de pesquisa que proporciona o fácil acesso à informação.">
	<meta property="og:image" content="https://i1.wp.com/rockcontent.com/br/wp-content/uploads/sites/2/2019/05/site-de-busca.png">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="U1M Busca">
	<meta name="twitter:title" content="U1M Busca | Tudo sobre: <?php echo $id; ?>">
	<meta name="twitter:description" content="O U1M Busca é um serviço de pesquisa que proporciona o fácil acesso à informação.">
	<meta name="twitter:image" content="https://i1.wp.com/rockcontent.com/br/wp-content/uploads/sites/2/2019/05/site-de-busca.png">
    
	<link rel="shortcut icon" href="https://gean.me/favicon.ico">
	<link rel="apple-touch-icon" href="https://i1.wp.com/cdn.jsdelivr.net/gh/geanramos/files/logo/7.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/geanramos/files/style-busca.css?v=1">

    <script>
        (function() {
            var cx = '014348567201131082906:crtrduzrtog';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx + "";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
    </script>
</head>
<body>
	<h1 id="title" class="font-zero">U1M Busca - Resultados para <?php echo $id; ?></h1>
	<div id="result" class="container uol">
		<section class="main" id="">
			<h1 class="font-zero">Encontre o que você procura</h1>
			<a href="/busca" title="Voltar para página inicial">
				<img style="height: 50px;margin: 21px 0 0;" src="https://i1.wp.com/cdn.jsdelivr.net/gh/geanramos/files/logo/7.png?resize=250,64" alt="Logo do U1M Busca" title="U1M Busca" class="logo">
			</a>
			<div class="search">
				<!--<gcse:searchbox gname="buscaBox" enableOrderBy="false" queryParameterName="term" enableHistory="true"></gcse:searchbox>-->
                <div class="gcse-searchbox-only"></div>
				<div class="powered">
					<span>Powered by</span><img src="https://www.google.com.br/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" title="Google" alt="Google">
				</div>
			</div>
		</section>
		<!-- AddToAny BEGIN -->
        <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:20px;top:120px;">
        <!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a> | //static.addtoany.com/menu/page.js-->
        <a class="a2a_button_whatsapp"></a>
        <a class="a2a_button_facebook"></a>
        <a class="a2a_button_twitter"></a>
        </div>
        <!-- AddToAny END -->
		<section class="result-list">
			<h1 class="font-zero">Resultados para <?php echo $id; ?></h1>
            <div class="gcse-searchresults-only"></div>
			<!--<div class="search-output-content"></div>-->
		</section>
		<section>
			<h1 class="font-zero">Anúncios</h1>
			<div id="ads-container-bottom"></div>
			<div class="clear"></div>
		</section>
		<div id="pagination"></div>
	</div>
	<footer>© 2004 - <span id="footer-date"></span> Gean - O melhor conteúdo.<span class="hide-sm"> - Todos os direitos reservados</span></footer>
	<script src="https://cdn.jsdelivr.net/gh/geanramos/files/scripts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/home-assets/puritym/js/page.js"></script>
</body>
</html>