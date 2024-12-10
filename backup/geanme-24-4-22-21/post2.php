<?php

// Link original
$link_original = $_GET['url'];

// Faça uma solicitação GET para o link original
$html = file_get_contents($link_original);

// Encontre o link rel="shortlink" no HTML usando expressão regular
if (preg_match('/<link rel="shortlink" href="(.*?)" \/>/', $html, $matches)) {
    $link_segundo = $matches[1];
    // Extrai o ID do segundo link
    $url_parts = parse_url($link_segundo);
    if (isset($url_parts['query'])) {
        parse_str($url_parts['query'], $query);
        if (isset($query['p'])) {
            $id = $query['p'];
            echo "ID do segundo link: " . $id;
        } else {
            echo "Não foi possível encontrar o ID do segundo link.";
        }
    } else {
        echo "Não foi possível encontrar o ID do segundo link.";
    }
} else {
    echo "Não foi possível encontrar o link rel='shortlink' no HTML.";
}

?>
