<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Imagens</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .gallery-item {
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        .gallery-item a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            background-color: #fff;
            text-align: center;
        }
        .gallery-item a:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Galeria de Imagens</h1>
        <div class="gallery">
		<?php
        // Inclua a biblioteca Simple HTML DOM Parser
        include_once('simple_html_dom.php');

        // Verifique se o parâmetro 'c' foi passado na URL
        if (isset($_GET['c'])) {
            // Obtenha o ID do canal da URL
            $channelId = $_GET['c'];

            // URL do canal do YouTube
            $channelUrl = "https://www.youtube.com/channel/{$channelId}/videos";

            // Obtenha o conteúdo HTML da página do canal
            $html = file_get_html($channelUrl);

            // Verifique se o HTML foi carregado corretamente
            if ($html) {
                // Crie o nome do arquivo
                $filename = "{$channelId}.html";

                // Salve o conteúdo HTML no arquivo TXT
                file_put_contents($filename, $html);

                // Exiba uma mensagem de sucesso
                echo "https://gean.me/code/$filename";
            } else {
                // Exiba uma mensagem de erro se o HTML não puder ser carregado
                echo "Erro ao carregar a página do canal.";
            }

            // Limpe a memória
            $html->clear();
            unset($html);
        } else {
            // Se o parâmetro 'c' não foi fornecido na URL, exiba uma mensagem de erro
            echo "ID do canal não fornecido na URL.";
        }
        ?>
        </div>
    </div>
</body>
</html>
