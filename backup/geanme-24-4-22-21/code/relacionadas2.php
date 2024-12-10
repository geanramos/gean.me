<?php

// Verificando se o parâmetro ?p= foi passado na URL
if (isset($_GET['p'])) {
    // Obtendo o valor do parâmetro ?p=
    $name = $_GET['p'];
    
    // URL da página com o parâmetro ?p=
    $url = "https://www.receiteria.com.br/receita/" . urlencode($name);

    // Obtendo o conteúdo da página
    $html = file_get_contents($url);

    // Substituindo a URL
    $html = str_replace("www.receiteria.com.br/receita/", "gean.me/receita/", $html);
    $html = str_replace("https://www.receiteria.com.br/wp-content/uploads/", "https://gean.me/cdn/400x225/", $html);
    $html = str_replace("-400x220", "", $html);

    // Encontrando a parte do HTML desejada
    preg_match('/<div class="relacionadas">(.*?)<aside class="col-12 col-md-4 sticky">/s', $html, $matches);

    // Verificando se foi encontrado o trecho desejado
    if (isset($matches[1])) {
        $content = $matches[1];

        // Encontrando todas as URLs
        preg_match_all('/<a\s+(?:[^>]*?\s+)?href=([\'"])(.*?)\1/', $content, $urlMatches);
        $urls = $urlMatches[2];

        // Encontrando todas as imagens dentro de <noscript>
        preg_match_all('/<img\s+(?:[^>]*?\s+)?src=([\'"])(.*?)\1/', $content, $imageMatches);
        $images = $imageMatches[2];

        // Encontrando todas as descrições
        preg_match_all('/<h3>(.*?)<\/h3>/', $content, $descriptionMatches);
        $descriptions = $descriptionMatches[1];

        // Limitando para as 6 primeiras receitas
        $urls = array_slice($urls, 0, 6);
        $images = array_slice($images, 0, 6);
        $descriptions = array_slice($descriptions, 0, 6);

        // Exibindo os resultados | https://i1.wp.com/www.bbhos.com/images/og_noimg.png?resize=624,351 | " . $images[$i] . "
        for ($i = 0; $i < count($urls); $i++) {
echo "<div class='item features-image сol-12 col-md-6 col-lg-4'>";
echo "<div class='item-wrapper'>";
echo "<div class='item-img'>";
echo "<a href='" . $urls[$i] . "'><img src='" . $images[$i] . "' alt='" . $descriptions[$i] . " por Gean Ramos' title='" . $descriptions[$i] . " por Gean Ramos' /></a>";
echo "</div>";
echo "<div class='item-content'>";
echo "<p class='mbr-text mbr-fonts-style mt-3 display-7'>" . $descriptions[$i] . "</p>";
echo "</div>";
echo "</div>";
echo "</div>";
        }
    } else {
        echo "Não Temos indicações";
    }
} else {
    echo "OPS! Erro Interno";
}
?>