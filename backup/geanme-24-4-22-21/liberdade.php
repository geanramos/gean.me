<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<meta property="og:image" content="https://image.tmdb.org/t/p/original/tXHpvlr5F7gV5DwgS7M5HBrUi2C.jpg" />
    <title>Um sonho de Liberdade</title>
    <style>
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}

#videoContainer {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%; /* Proporção 16:9 */
}

iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}


    </style>
</head>
<body>
    <div class="video-container">
        <?php
        // Verifica se o parâmetro 'v' está presente na URL
        if (isset($_GET['v'])) {
            // Obtém o valor do parâmetro 'v'
            $videoID = $_GET['v'];

            // Monta a URL do vídeo do YouTube
            $youtubeURL = 'https://www.youtube.com/watch?v=' . $videoID;

            // Obtém o conteúdo HTML da página do vídeo do YouTube
            $html = file_get_contents($youtubeURL);

            // Busca o título do vídeo na página HTML
            preg_match('/<title>(.*?)<\/title>/', $html, $matches);
            $videoTitle = isset($matches[1]) ? $matches[1] : 'Video do YouTube';

            // Gera o código do iframe com o vídeo do YouTube
            $iframeCode = '<iframe width="800px" height="450px" src="https://player.filmezando.me/embed/8375216438/?' . $videoID . '" frameborder="0" allowfullscreen></iframe>';

            // Exibe o iframe com o vídeo do YouTube
            echo $iframeCode;

            // Define o título da página com o título do vídeo
            echo '<script>document.title = "' . $videoTitle . '";</script>';
        } else {
            echo "<p>Parâmetro 'v' não encontrado na URL.</p>";
        }
        ?>
    </div>
</body>
</html>
