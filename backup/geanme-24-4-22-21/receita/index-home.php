<?php
// Verifique se o parâmetro 'url' foi passado na URL
if (!isset($_GET["url"])) {
    die("<script language=\"JavaScript\"> window.location=\"https://gean.me/receita.html\"; </script>");
}

// Obtenha o valor do parâmetro 'url'
$id = $_GET["url"];

// Obtenha o conteúdo HTML da página
$html = file_get_contents("https://gean.me/post1?url=$id");

// URL da página de incorporação da receita
$idEmbed = 'https://www.receiteria.com.br/receita/'.$id.'/embed/';

// Obtenha o conteúdo HTML da página de incorporação
$htmlEmbed = file_get_contents($idEmbed);

// Substitua todas as ocorrências de "www.receiteria.com.br" por "pudimperfeito.50x.com.br"

$html = str_replace('em www.receiteria.com.br', 'em <a href="https://gean.me/receita.html">https://gean.me/receita.html</a>', $html);
$html = str_replace('<img data-perfmatters-preload src="https://www.receiteria.com.br/wp-content/themes/receiteria/assets/receiteria.png" alt="Receiteria" width="150">', '<!--logo-->', $html);
	
// Obtém a data atual
$date = date('Y-m-d');

// Verifique se o conteúdo HTML foi obtido com sucesso
if ($htmlEmbed !== false) {
    // Use preg_match para extrair o título da receita
    preg_match('/<title>(.*?)<\/title>/', $htmlEmbed, $title_matches);
	$title = isset($title_matches[1]) ? $title_matches[1] : 'Fogo na Cozinha';

    // Use preg_match para extrair a URL da imagem da receita
    preg_match('/<img .*? src="(.*?)"/', $htmlEmbed, $image_matches);
    $image_url = isset($image_matches[1]) ? $image_matches[1] : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSruSBb2n9wkbQUJA2-guSU0Iyx-bPDE8QEVpcstYCbYY4aLDNDyQ&usqp=CAU';

    // Salvando o URL da imagem em uma variável para ser utilizada no HTML abaixo
    $id_img = $image_url;
} else {
    // Se houver um erro ao obter o conteúdo HTML da página de incorporação, exiba uma mensagem de erro
    die("<script language=\"JavaScript\"> window.location=\"https://gean.me/receita.html\"; </script>");
}
?>
<?php
// Obtenha o valor do parâmetro 'url'
$imgSocial = $_GET["url"];

// URL da página a ser copiada
$urlSocial = "https://gean.me/receita/img-receita.php?url=$imgSocial";

// Obtenha o conteúdo HTML da página
$htmlSocial = file_get_contents($urlSocial);

// Verifique se a requisição HTTP foi bem-sucedida
if ($htmlSocial !== false) {
    // Exiba o conteúdo HTML
    //echo $htmlSocial;
	// < ? php echo $id_img; ? >
} 

// INICIO - IMAGEM COPIADA PARA LOCAL HOST
// URL da imagem a ser copiada
$image_url1 = "https://images.weserv.nl/?w=600&h=338&output=webp&q=20&t=square&url=$htmlSocial";

// Lê o conteúdo da imagem
$image_data = file_get_contents($image_url1);

if ($image_data !== false) {
    // Obtém o nome do arquivo da URL
    $file_name = basename($image_url1);

    // Caminho completo para a pasta cache
    $cache_folder = '../cdn/';

    // Verifica se a pasta cache existe, se não, cria-a
    if (!is_dir($cache_folder)) {
        mkdir($cache_folder);
    }

    // Caminho completo para salvar a imagem na pasta cache
    $file_path = $cache_folder . $file_name;

    // Salva o conteúdo da imagem em um novo arquivo
    $savedLocal = file_put_contents($file_path, $image_data);

    if ($savedLocal !== false) {
        // echo "https://gean.me/cdn/$file_name";
    } 
} 
// FINAL - IMAGEM COPIADA PARA LOCAL HOST
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, viewport-fit=cover, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=10.0">
    <title>Fogo na Cozinha: <?php echo $title; ?> </title>
    <meta name="description" content="<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia">
    <meta name="keywords" content="<?php echo $title; ?>, Receitas fáceis e rápidas, Receitas vegetarianas, Receitas fit, Receitas para o dia a dia, Receitas de doces, Receitas de salgados, receitas na airfryer, receitas para crianças, receitas com sobras">
    <meta name="robots" content="index,follow,max-image-preview:large">
    <meta name="GOOGLEBOT" content="index, follow, all" />
    <meta name="author" content="Fogo na Cozinha">
    <meta name="copyright" content="Fogo na Cozinha">
    
    <!--inicio dos cards-->
    <link rel="canonical" href="https://gean.me/receita/<?php echo $id; ?>/" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Fogo na Cozinha: <?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia" />
    <meta property="og:url" content="https://gean.me/receita/<?php echo $id; ?>/" />
    <meta property="og:site_name" content="GeanRamos" />
    <meta property="article:published_time" content="<?php echo $date; ?>T00:01:14+00:00" />
    <meta property="og:image" content="https://images.weserv.nl/?url=gean.me/wp-content/uploads/<?php echo $file_name; ?>&w=600&h=338&output=webp&q=20&t=square" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="338" />
    <meta property="fb:pages" content="312914505389872">
	
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Fogo na Cozinha: <?php echo $title; ?>" />
    <meta name="twitter:description" content="<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia" />
    <meta name="twitter:image" content="https://images.weserv.nl/?url=gean.me/wp-content/uploads/<?php echo $file_name; ?>&w=150&h=150&output=webp&q=20&t=square" />
    <meta name="twitter:site" content="@geanramos">
    <!--fim dos card-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <script type="application/ld+json">
	{
		"@context": "http://schema.org/",
		"@type": "Recipe",
		"name": "Fogo na Cozinha: <?php echo $title; ?>",
		"url": "https://gean.me/receita/<?php echo $id; ?>/",
		"image": {
			"@context": "http://schema.org",
			"@type": "ImageObject",
			"url": "https://images.weserv.nl/?url=gean.me/wp-content/uploads/<?php echo $file_name; ?>&w=600&h=338&output=webp&q=20&t=square"
			},
		"author": {
			"@context": "http://schema.org",
			"@type": "Organization",
			"name": "Fogo na Cozina"
			},
		"datePublished": "<?php echo $date; ?>T00:01:14+00:00",
		"description": "<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia",
		"aggregateRating":{
			"@type": "AggregateRating",
			"reviewCount": "50",
			"ratingValue": "4.9",
			"ratingCount": "489",
			"bestRating": 5,
			"worstRating": 1
			},
			"keywords": "<?php echo $title; ?>",
			"totalTime": "PT57M",
	}
	</script>
	
<style>#print{max-width:800px;margin:0 auto;padding:20px;font-family:'Poppins',sans-serif}@media (max-width:768px){#print{padding:10px}}@media (max-width:480px){#print{padding:5px}}.poppins-regular{font-family:"Poppins",sans-serif;font-weight:400;font-style:normal}.poppins-bold{font-family:"Poppins",sans-serif;font-weight:700;font-style:normal}.print{display:flex;justify-content:center;align-items:center}img{border-radius:8px display:block;margin:auto;display:block;border-radius:8px;max-width:90%}.botaoWhatsapp:link,.botaoWhatsapp:active,.botaoWhatsapp:visited{position:fixed;bottom:20px;right:20px;width:48px;height:48px;border-radius:100%;background:#25d366;display:flex;align-items:center;justify-content:center;box-shadow:0 3px 0 #00000024;z-index:999;transition:all 0.5s ease}.botaoWhatsapp em{display:block;background-image:url(https://cdn.jsdelivr.net/gh/geanramos/pudimperfeito/extra/whatsapp-icon.svg);width:25px;height:26px;background-repeat:no-repeat;background-size:contain}.botaoWhatsapp:hover{background:#1ee167;box-shadow:0 3px 9px 0 #00000024}._320 .botaoWhatsapp{bottom:86px;right:20px;width:48px;height:48px;border-radius:100%}</style>
  </head>
  <body align="center" height="100%">
    <img data-perfmatters-preload src="https://i.imgur.com/Qt9Ceky.png" alt="Fogo na Cozinha" width="150" height="57.75">
    <p>
      <img class="post" src="https://images.weserv.nl/?url=gean.me/wp-content/uploads/<?php echo $file_name; ?>&w=600&h=338&output=webp&q=20&t=square" width="600" height="338" title="<?php echo $title; ?> - Gean Ramos" alt="<?php echo $title; ?> - Gean Ramos">
    </p>
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:20px;top:120px;">
<!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a> | //static.addtoany.com/menu/page.js-->
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
</div>
<!-- AddToAny END -->
    <div id="print" align="left">
	<?php echo $html; ?>
	</div>
  </body>
  <a class="botaoWhatsapp" target="_blank" href="https://api.whatsapp.com/send?text=<?php echo $title; ?> https://gean.me/receita/<?php echo $id; ?>/?utm_source=whatsapp"><em></em></a>
  <script src="https://cdn.jsdelivr.net/gh/geanramos/files/home-assets/puritym/js/page.js"></script>
  <iframe src="https://images.weserv.nl/?url=gean.me/wp-content/uploads/<?php echo $file_name; ?>&w=150&h=150&output=webp&q=20&t=square" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</html>