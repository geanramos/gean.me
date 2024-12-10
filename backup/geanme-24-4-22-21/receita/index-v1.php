<?php
// URL da página a ser copiada
$url = isset($_GET['url']) ? $_GET['url'] : '';
if(empty($url)){
    die("ERRO 404");
}

// Obtenha o conteúdo HTML da página
$html = file_get_contents("https://gean.me/post1?url=$url");

// Verifique se houve algum erro ao obter o conteúdo HTML
if ($html === false) {
    die("OPS! esta página não existe");
}

// Substitua todas as ocorrências de "www.receiteria.com.br" por "pudimperfeito.50x.com.br"
$html = str_replace('em www.receiteria.com.br', 'em https://gean.me/receita.html', $html);
$html = str_replace('<img data-perfmatters-preload src="https://www.receiteria.com.br/wp-content/themes/receiteria/assets/receiteria.png" alt="Receiteria" width="150">', '<!--logo-->', $html);

?>

<?php
// Obtenha a URL completa
$urlAtual = $_SERVER['REQUEST_URI'];
// Extraia a parte da URL após "https://gean.me/receita/"
$codigo = str_replace("https://gean.me", "", $urlAtual);
// Remova todas as ocorrências de "/"
$codigo = str_replace("/receita/", "", $codigo);
?>

<?php

// Obtenha o endereço da imagem da meta tag "og:image"
$url_img = "https://www.receiteria.com.br/receita/panqueca-de-frango/";
preg_match('/<meta property="og:image" content="(.*?)" \/>/', $html, $matches);
if (isset($matches[1])) {
  $url_img = $matches[1];
} else {
  $url_img = "https://i.imgur.com/QEkgg9S.jpeg";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fogo na Cozinha - <?php echo $codigo; ?></title>
	<meta name='description' content='Cansada de comer a mesma coisa? O (Fogo na Cozinha) te leva a um loop infinito de delícias, com receitas que vão te fazer pirar na batatinha (e no brigadeiro também)!'>
	
	<!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="(Fogo na Cozinha): O Tinder da culinária!">
  <meta name="twitter:description" content="Cansada de comer a mesma coisa? O (Fogo na Cozinha) te leva a um loop infinito de delícias, com receitas que vão te fazer pirar na batatinha (e no brigadeiro também)!">
  <meta name="twitter:image:src" content="<?php echo $matches[1]; ?>?resize=600,330">
  <meta property="og:image:width" content="600" />
  <meta property="og:image:height" content="330" />
  <meta property="og:image:type" content="image/jpg" />
  <meta name="author" content="Gean Ramos" />
  <meta name="twitter:site" content="@geanramos" />
  <meta name="twitter:creator" content="@geanramos" />
  <meta name="twitter:label1" content="Escrito por" />
  <meta name="twitter:data1" content="Gean Ramos" />
  <meta name="twitter:label2" content="Est. tempo de leitura" />
  <meta name="twitter:data2" content="20 minutos" />
  <meta name="twitter:domain" content="https://gean.me">

  <!-- Facebook OpenGraph -->
  <meta property="og:title" content="Fogo na Cozinha: O Tinder da culinária!">
  <meta property="og:url" content="https://gean.me/receita/<?php echo $codigo; ?>" />
  <meta property="og:description" content="Cansada de comer a mesma coisa? O (Fogo na Cozinha) te leva a um loop infinito de delícias, com receitas que vão te fazer pirar na batatinha (e no brigadeiro também)!">
  <meta property="article:published_time" content="2023-02-28T14:16:28+00:00" />
  <meta property="og:image" content="<?php echo $url_img; ?>?resize=600,330">
  <meta property="og:url" content="https://gean.me/receita/<?php echo $codigo; ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
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
  <p><img class="post" alt="<?php echo $codigo; ?>" src="<?php echo $url_img; ?>?resize=600,330"></p>
    <div id="print" align="left"> <?php echo $html; ?> </div>
  </body>
</html>