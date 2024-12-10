<?php
// Verifique se o parâmetro 'url' foi passado na URL
if (!isset($_GET["url"])) {
    die("Parâmetro 'url' não especificado.");
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
$html = str_replace('em www.receiteria.com.br', 'em https://gean.me/receita.html', $html);
$html = str_replace('<img data-perfmatters-preload src="https://www.receiteria.com.br/wp-content/themes/receiteria/assets/receiteria.png" alt="Receiteria" width="150">', '<!--logo-->', $html);

// Verifique se o conteúdo HTML foi obtido com sucesso
if ($htmlEmbed !== false) {
    // Use preg_match para extrair o título da receita
    preg_match('/<title>(.*?)<\/title>/', $htmlEmbed, $title_matches);
    $title = isset($title_matches[1]) ? $title_matches[1] : 'Título não encontrado';

    // Use preg_match para extrair a URL da imagem da receita
    preg_match('/<img .*? src="(.*?)"/', $htmlEmbed, $image_matches);
    $image_url = isset($image_matches[1]) ? $image_matches[1] : '';

    // Salvando o URL da imagem em uma variável para ser utilizada no HTML abaixo
    $id_img = $image_url;
} else {
    // Se houver um erro ao obter o conteúdo HTML da página de incorporação, exiba uma mensagem de erro
    die("Erro ao obter o conteúdo HTML da página de incorporação.");
}

?>
<?php
// Obtém a data atual
$date = date('Y-m-d');
// Exibe a data atual no formato especificado
echo $date;
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fogo na Cozinha: <?php echo $title; ?></title>
	<meta name="description" content="<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia">
	
	<!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="(Fogo na Cozinha): <?php echo $title; ?>">
  <meta name="twitter:description" content="<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia">
  <meta name="twitter:image:src" content="<?php echo $image_url; ?>">
  <meta property="og:image:width" content="600" />
  <meta property="og:image:height" content="330" />
  <meta property="og:image:type" content="image/jpg" />
  <meta name="author" content="Gean Ramos" />
  <meta name="twitter:site" content="@geanramos" />
  <meta name="twitter:creator" content="@geanramos" />
  <meta name="twitter:label1" content="Escrito por" />
  <meta name="twitter:data1" content="Gean Ramos" />
  <meta name="twitter:label2" content="Est. tempo de leitura" />
  <meta name="twitter:data2" content="57 minutos" />
  <meta name="twitter:domain" content="https://gean.me">

  <!-- Facebook OpenGraph -->
  <meta property="og:title" content="Fogo na Cozinha: <?php echo $title; ?>">
  <meta property="og:url" content="https://gean.me/receita/<?php echo $id; ?>" />
  <meta property="og:description" content="<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia">
  <meta property="article:published_time" content="2023-02-28T14:16:28+00:00" />
  <meta property="og:image" content="<?php echo $image_url; ?>">
  <meta property="og:url" content="https://gean.me/receita/<?php echo $id; ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
	<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Recipe",
  "name": "Fogo na Cozinha: <?php echo $title; ?>",
  "url": "https://gean.me/receita/<?php echo $id; ?>",
  "image": {
    "@context": "http://schema.org",
    "@type": "ImageObject",
    "url": "<?php echo $image_url; ?>"
  },
  "author": {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Fogo na Cozina"
  },
  "datePublished": "<?php echo $date; ?>",
  "description": "<?php echo $title; ?>: Saboroso, nutritivo e fácil de fazer! Experimente essa receita rápida e perfeita para o dia a dia",
  "aggregateRating": {
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
	<style>
      /* Estilos para desktop */
      #print {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        font-family: 'Poppins', sans-serif;
      }

      /* Estilos para tablet */
      @media (max-width: 768px) {
        #print {
          padding: 10px;
        }
      }

      /* Estilos para celular */
      @media (max-width: 480px) {
        #print {
          padding: 5px;
        }
      }

      .poppins-regular {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
      }

      .poppins-bold {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: normal;
      }
	  img {
		  border-radius: 8px
		  display: block;
		  margin: auto;
		  }
	.print {
		display: flex;
		justify-content: center;
		align-items: center;
		}

	img {
		display: block;
		border-radius: 8px;
		max-width: 80%;
		}
    </style>

  </head>
  <body align="center" height="100%">
  <img data-perfmatters-preload src="https://i.imgur.com/Qt9Ceky.png" alt="Fogo na Cozinha" width="150">
  <p><img class="post" alt="<?php echo $title; ?>" src="<?php echo $id_img; ?>"></p>
    <div id="print" align="left"> <?php echo $html; ?> </div>
  </body>
</html>
