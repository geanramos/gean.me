<?php
// Obtenha o valor do parâmetro 'url'
$urlIMG = $_GET["url"];

// Obtenha o conteúdo HTML da página
$html = file_get_contents("https://www.receiteria.com.br/receita/$urlIMG/");

// Verifica se o conteúdo HTML foi obtido com sucesso
if ($html !== false) {
    // Expressão regular para extrair o endereço da imagem
    $pattern = '/<meta property="og:image" content="(.*?)" \/>/';

    // Encontra a primeira ocorrência da tag meta com o padrão especificado
    preg_match($pattern, $html, $matches);

    // Exibe apenas o endereço da imagem sem o protocolo "https://"
    if (isset($matches[1])) {
        $image_url = preg_replace('/^https?:\/\//', '', $matches[1]);
        echo "" . $image_url;
    } else {
        echo "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSruSBb2n9wkbQUJA2-guSU0Iyx-bPDE8QEVpcstYCbYY4aLDNDyQ&usqp=CAU";
    }
} else {
    echo "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSruSBb2n9wkbQUJA2-guSU0Iyx-bPDE8QEVpcstYCbYY4aLDNDyQ&usqp=CAU";
}
?>
