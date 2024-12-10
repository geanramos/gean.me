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
$html = str_replace('www.receiteria.com.br', 'pudimperfeito.50x.com.br', $html);
$html = str_replace('<input class="form-check-input" type="checkbox" value id=', '<id=', $html);
$html = str_replace('</h1>', '</h1><p><script src="https://pudimperfeito.50x.com.br/extra/banner468x60.js" nonce="PudimADS"></script></p>', $html);

?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>196 Sabores: O Tinder da culinária!</title>
	<meta name='description' content='Cansada de comer a mesma coisa? O 196 Sabores te leva a um loop infinito de delícias, com receitas que vão te fazer pirar na batatinha (e no brigadeiro também)!'>
	
	<!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="196 Sabores: O Tinder da culinária!">
  <meta name="twitter:description" content="Cansada de comer a mesma coisa? O 196 Sabores te leva a um loop infinito de delícias, com receitas que vão te fazer pirar na batatinha (e no brigadeiro também)!">
  <meta name="twitter:image:src" content="https://i2.wp.com/drive.50x.com.br/pudimperfeito/images/frango-assado.jpeg?resize=600,330">
  <meta property="og:image:width" content="600" />
  <meta property="og:image:height" content="330" />
  <meta property="og:image:type" content="image/jpg" />
  <meta name="author" content="Pudim Perfeito" />
  <meta name="twitter:site" content="@geanramos" />
  <meta name="twitter:creator" content="@geanramos" />
  <meta name="twitter:label1" content="Escrito por" />
  <meta name="twitter:data1" content="Pudim Perfeito" />
  <meta name="twitter:label2" content="Est. tempo de leitura" />
  <meta name="twitter:data2" content="2 minutos" />
  <meta name="twitter:domain" content="https://pudimperfeito.50x.com.br">

  <!-- Facebook OpenGraph -->
  <meta property="og:title" content="196 Sabores: O Tinder da culinária!">
  <meta property="og:description" content="Cansada de comer a mesma coisa? O 196 Sabores te leva a um loop infinito de delícias, com receitas que vão te fazer pirar na batatinha (e no brigadeiro também)!">
  <meta property="article:published_time" content="" />
  <meta property="og:image" content="https://i2.wp.com/drive.50x.com.br/pudimperfeito/images/frango-assado.jpeg?resize=600,330">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <style>
      /* Estilos para desktop */
      #print {
        max-width: 800px;
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
		img {border-radius: 8px}
      }
    </style>
  </head>
  <body>
    <div id="print"> <?php echo $html; ?> </div>
  </body>
</html>