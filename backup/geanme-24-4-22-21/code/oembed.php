<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações da Receita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
		img {
			width: 320px;
			}
    </style>
	<style>#entry-content{max-width:800px;margin:0 auto;padding:20px;font-family:'Poppins',sans-serif}@media (max-width:768px){#entry-content{padding:10px}}@media (max-width:480px){#entry-content{padding:5px}}.poppins-regular{font-family:"Poppins",sans-serif;font-weight:400;font-style:normal}.poppins-bold{font-family:"Poppins",sans-serif;font-weight:700;font-style:normal}.entry-content{display:flex;justify-content:center;align-items:center}img{border-radius:8px display:block;margin:auto;display:block;border-radius:8px;max-width:90%}.botaoWhatsapp:link,.botaoWhatsapp:active,.botaoWhatsapp:visited{position:fixed;bottom:20px;right:20px;width:48px;height:48px;border-radius:100%;background:#25d366;display:flex;align-items:center;justify-content:center;box-shadow:0 3px 0 #00000024;z-index:999;transition:all 0.5s ease}.botaoWhatsapp em{display:block;background-image:url(https://cdn.jsdelivr.net/gh/geanramos/pudimperfeito/extra/whatsapp-icon.svg);width:25px;height:26px;background-repeat:no-repeat;background-size:contain}.botaoWhatsapp:hover{background:#1ee167;box-shadow:0 3px 9px 0 #00000024}._320 .botaoWhatsapp{bottom:86px;right:20px;width:48px;height:48px;border-radius:100%}</style>
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<!--<div id="entry-content" align="left">-->
<div id="entry-content">
<?php

    // URL do Embed
    $url = 'https://www.receiteria.com.br/receita/bolo-de-cenoura-de-liquidificador/embed/';

    // Obtém o conteúdo da página
    $html = file_get_contents($url);

    // Expressão regular para extrair o postid
    $pattern = '/postid-(\d+)/';

    // Procura pelo padrão na página
    if (preg_match($pattern, $html, $matches)) {}  
    
    // URL do JSON
    $json_url = 'https://www.receiteria.com.br/wp-json/oembed/1.0/embed?url=https://www.receiteria.com.br/receita/bolo-de-cenoura-de-liquidificador/';

    // Obtém o JSON
    $json_data = file_get_contents($json_url);

    // Decodifica o JSON
    $data = json_decode($json_data, true);

    // Verifica se os dados foram decodificados com sucesso
    if ($data) {
        echo '<h1>' . $data['title'] . '</h1>';
		echo '<p><strong>Thumbnail URL:</strong> <img src="https://images.weserv.nl/?w=600&h=338&output=webp&q=20&t=square&url=' . $data['thumbnail_url'] . '" alt="Thumbnail"></p>';
		echo '<p><strong>Description:</strong> ' . $data['description'] . '</p>';
        echo '<p><strong>Author Name:</strong> ' . $data['author_name'] . '</p>';
		echo '<p><strong>Author URL:</strong> ' . $data['author_url'] . '</p>';
		echo '<p><strong>Post Id:</strong> ' . $matches[1] . '</p>';
		echo '<p><strong>Thumbnail Width:</strong> ' . $data['thumbnail_width'] . '</p>';
		echo '<p><strong>Thumbnail Height</strong> ' . $data['thumbnail_height'] . '</p>';
    } else {
        echo 'Erro ao carregar os dados.';
    }
	// URL da imagem
	$urlImgName = 'https://www.receiteria.com.br/wp-content/uploads/bolo-de-cenoura-de-liquidificador-1.jpeg';
	
	// Obtém o nome do arquivo da URL
	$imgName = basename($urlImgName);
	// Exibe o nome do arquivo
	echo '<p><strong>Img Name</strong> ' . $imgName . '</p>';
    ?>

	<?php

// URL da página
$url = 'https://www.receiteria.com.br/imprimir/?id=114434';

// Obtém o conteúdo da página
$html = file_get_contents($url);

// Define o padrão de início e fim
$pattern_start = '/<p><i class="fa-solid fa-clock">/';
$pattern_end = '/<hr>/';

// Procura pelo padrão de início
if (preg_match($pattern_start, $html, $start_match, PREG_OFFSET_CAPTURE)) {
    // Procura pelo padrão de fim
    if (preg_match($pattern_end, $html, $end_match, PREG_OFFSET_CAPTURE, $start_match[0][1])) {
        // Extrai o conteúdo entre os padrões de início e fim
        $content = substr($html, $start_match[0][1], $end_match[0][1] - $start_match[0][1]);
        
        // Substitui as ocorrências de 'www.receiteria.com.br' por 'gean.me'
        $content = str_replace('www.receiteria.com.br', 'gean.me', $content);
		$content = str_replace('youtube.com', 'gean.me', $content);
        
        // Exibe o conteúdo
        echo $content;
    } else {
        // Se não encontrar o padrão de fim, exibe uma mensagem de erro
        echo "Padrão de fim não encontrado.";
    }
} else {
    // Se não encontrar o padrão de início, exibe uma mensagem de erro
    echo "Padrão de início não encontrado.";
}

?>
<hr>
</div>
</body>

</html>
