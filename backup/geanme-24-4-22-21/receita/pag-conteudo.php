<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Receitas</title>

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">-->
<link data-pmdelayedstyle="https://www.receiteria.com.br/wp-content/themes/receiteria/css/bootstrap.min.css" rel="stylesheet">
<link href="https://www.receiteria.com.br/wp-content/themes/receiteria/style.css" rel="stylesheet">
<style> 
/* Estilos para desktop */
 .row {
     max-width: 800px;
     margin: 0 auto;
     padding: 20px;
     font-family: 'Poppins', sans-serif;
}
/* Estilos para tablet */
 @media (max-width: 768px) {
     .row {
         padding: 10px;
    }
}
/* Estilos para celular */
 @media (max-width: 480px) {
     .row {
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
 .row {
     display: flex;
     justify-content: center;
     align-items: center;
}
 img {
     border-radius: 8px display: block;
     margin: auto;
     display: block;
     border-radius: 8px;
     max-width: 100%;
	 height: 56%;
}
.post-lista .receita img {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    max-width: 700px;
    max-height: 393px;
}
 </style>
</head>
<body>

    <?php
// URL da página a ser copiada
$url = "https://www.receiteria.com.br/receitas-para-almoco/";

// Obtenha o conteúdo HTML da página
$html = file_get_contents($url);

// Verifique se o conteúdo HTML foi obtido com sucesso
if ($html !== false) {
    // Encontre a posição inicial da tag <div class="container list">
    $start_pos = strpos($html, '<div class="container list">');
    
    // Se a tag for encontrada, encontre a posição final da tag </div>
    if ($start_pos !== false) {
        $start_pos = strpos($html, '>', $start_pos) + 1; // Posição após o '>'
        $end_pos = strpos($html, '<div class="share mb-4">', $start_pos);
        
        // Extrai o conteúdo dentro da tag <div class="container list">
        $content = substr($html, $start_pos, $end_pos - $start_pos);
		
        // Substitui as ocorrências específicas
        $content = str_replace('class="img-fluid perfmatters-lazy" data-src="', 'class="img-fluid perfmatters-lazy" src="', $content);
        $content = str_replace('src="data:image/', 'data-src1="data:image/', $content);
		$content = str_replace('src="https://www.receiteria.com.br/wp-content/uploads/', 'src="https://images.weserv.nl/?url=gean.me/wp-content/uploads/', $content);
		$content = str_replace('<div class="post-info">', '<div class="post-info"><!--', $content);		
		$content = str_replace('<span class="date">', '--><span class="date">', $content);				
        // $content = str_replace('<img width="730" height="477" src="', '<img width="730" height="477" data-src="', $content);
        $content = str_replace('<a href="https://www.receiteria.com.br/receita/', '<a href="https://gean.me/receita/book?url=', $content);        
		// $content = str_replace('/" class="btn shadow-sm">', '" class="btn shadow-sm">', $content);        
		// $content = str_replace('/" class="imglink">', '" class="imglink">', $content);        
		// $content = str_replace('/"><h3>', '"><h3>', $content);        
		// $content = str_replace('/">', '">', $content);
		$content = str_replace('" /><noscript>', '&w=350&h=200&output=webp&q=80&t=square" /><noscript>', $content);
        $content = str_replace('Receiteria', 'Gean Ramos', $content);
        // Exibe o conteúdo extraído
        echo $content;
    } else {
        echo "<script language=\"JavaScript\"> window.location=\"https://gean.me/receita.html\"; </script>";
    }
} else {
    echo "<script language=\"JavaScript\"> window.location=\"https://gean.me/receita.html\"; </script>";
}
?>

</body>
 <style>
.post-lista .indice {
    border-radius: 10px;
    padding: 20px;
    font-weight: 500!important;
    display: inline-block;
    width: 93%;
}
 </style>
</html>
