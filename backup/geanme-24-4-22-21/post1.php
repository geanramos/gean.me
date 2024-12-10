<?php

// Função para obter o ID do segundo link
function getSecondLinkId($url) {
    // Faça uma solicitação GET para o link original
    $html = file_get_contents("https://www.receiteria.com.br/receita/$url");

    // Encontre o link rel="shortlink" no HTML usando expressão regular
    if (preg_match('/<link rel="shortlink" href="(.*?)" \/>/', $html, $matches)) {
        $link_segundo = $matches[1];
        // Extrai o ID do segundo link
        $url_parts = parse_url($link_segundo);
        if (isset($url_parts['query'])) {
            parse_str($url_parts['query'], $query);
            if (isset($query['p'])) {
                return $query['p']; 
            }
        }
    }
    return false;
}

// Verifica se o parâmetro 'url' foi enviado na URL
if (isset($_GET['url'])) {
    // Obtém o link original da URL
    $url = $_GET['url'];

    // Obtém o ID do segundo link
    $id = getSecondLinkId($url);

    if ($id) {
        ?>
        <!-- URL da página a ser copiada -->
        <?php
        $url = 'https://www.receiteria.com.br/imprimir/?id=' . $id;

        // Obtenha o conteúdo HTML da página
        $html = file_get_contents($url);

        // Extrai o texto entre as tags <div id="print"> e </div>
        if (preg_match('/<div id="print">(.*?)<\/div>/s', $html, $matches)) {
            // Imprime o texto encontrado
            echo $matches[1];
        } else {
            echo "Elemento '#print' não encontrado.";
        }
        ?>
        <?php
    } else {
        echo "Essa página foi abduzida por alienígenas! Se você a encontrar, por favor, avise a NASA!";
    }
} else {
    // Caso o parâmetro 'url' não tenha sido enviado na URL, exibe um formulário para que o usuário possa inserir o link original
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Gerar link de Impressão</title>
    </head>
    <body>
        <h2>Insira a URL:</h2>
        <form action="" method="get">
            <input type="text" name="url" placeholder="Insira o link original">
            <button type="submit">Enviar</button>
        </form>
    </body>
    </html>
    <?php
}

?>
