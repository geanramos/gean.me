<?php

// Verifica se o parâmetro ?r= foi passado na URL
if (isset($_GET['r'])) {
    // Obtém a keyword da URL
    $keyword = $_GET['r'];

    // Carrega os dados do arquivo JSON
    $json_data = file_get_contents('urls.json');
    $urls = json_decode($json_data, true);

    // Procura a URL correspondente à keyword fornecida
    foreach ($urls as $item) {
        if ($item['keyword'] === $keyword) {
            // Redireciona para a URL correspondente
            header("Location: " . $item['url']);
            exit();
        }
    }

    // Mostra uma mensagem de erro se a keyword não foi encontrada
    echo "<h1>Keyword não encontrada</h1>";
} else {
    // Mostra uma mensagem de erro se o parâmetro ?r= não foi fornecido
    echo "<h1>Parâmetro 'r' não fornecido</h1>";
}

?>
