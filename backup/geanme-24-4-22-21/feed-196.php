<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>196 Sabores - Feed de Receitas</title>
</head>
<body>
    <h1>196 Sabores</h1>
    <ul>
    <?php
        // URL do feed
        $feed_url = "https://www.receiteria.com.br/receita/feed/";

        // Obtém o conteúdo do feed
        $feed = simplexml_load_file($feed_url);

        // Verifica se o feed foi carregado corretamente
        if ($feed !== false) {
            // Contador para limitar as últimas 200 postagens
            $count = 0;

            // Itera sobre cada item do feed
            foreach ($feed->channel->item as $item) {
                // Extrai o título e o link do item
                $title = $item->title;
                $link = $item->link;

                // Substitui o link gerado pelo link personalizado
                $custom_link = str_replace("https://www.receiteria.com.br/receita/", "https://gean.me/receita/", $link);

                // Imprime o título e o link personalizado como itens de uma lista HTML
                echo "<li><a href='$custom_link'>$title</a></li>";

                // Incrementa o contador
                $count++;

                // Verifica se já foram exibidas as últimas 200 postagens
                if ($count >= 200) {
                    break;
                }
            }
        } else {
            echo "<li>Não foi possível carregar o feed.</li>";
        }
    ?>
    </ul>
</body>
</html>
