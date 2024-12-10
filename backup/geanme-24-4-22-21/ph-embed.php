<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
<body>
<style> body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; display: flex; justify-content: center; align-items: center; background-color: #000; } #fullscreen-image { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; object-fit: cover; } #player-button { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: block; width: 100px; height: 100px; border-radius: 50%; background-color: rgba(255, 255, 255, 0.7); text-align: center; line-height: 100px; text-decoration: none; color: #000; font-weight: bold; font-size: 32px; transition: all 0.3s ease; } #player-button:hover { background-color: rgba(255, 255, 255, 0.9); transform: translate(-50%, -50%) scale(1.1); } </style>
<?php
        $videoId = $_GET["v"];
        // URL do vídeo com o parâmetro ?v=
        $videoUrl = "https://pt.pornhub.com/view_video.php?viewkey=$videoId";

        // Obtém o conteúdo HTML da página do vídeo
        $html = file_get_contents($videoUrl);

        // Verifica se o conteúdo foi obtido com sucesso
        if ($html === false) {
            die('Erro ao obter conteúdo do vídeo.');
        }

        // Expressão regular para encontrar o trecho de script JSON-LD
        $pattern = '/<script type="application\/ld\+json">(.*?)<\/script>/s';

        // Executa a expressão regular no HTML para encontrar o script JSON-LD
        if (preg_match($pattern, $html, $matches)) {
            // Decodifica o JSON retornado em um array associativo
            $videoData = json_decode($matches[1], true);

            // Verifica se o JSON foi decodificado com sucesso
            if ($videoData !== null && isset($videoData['@type']) && $videoData['@type'] === 'VideoObject') {
                // Extrai e formata as informações do vídeo conforme necessário
                $name = $videoData['name'];
                $thumbnailUrl = $videoData['thumbnailUrl'];
                $author = $videoData['author'];


                // Exibe as informações do vídeo
                // echo '<p><strong>Título:</strong> ' . $name . '</p>';
                // echo '<p><strong>Duração:</strong> ' . $duration . '</p>';
                // echo '<p><strong>Thumbnail:</strong> <img src="' . $thumbnailUrl . '" alt="Thumbnail do Vídeo"></p>';
                // echo '<p><strong>Data de Publicação:</strong> ' . $uploadDate . '</p>';
                // echo '<p><strong>Descrição:</strong> ' . $description . '</p>';
                // echo '<p><strong>Autor:</strong> ' . $author . '</p>';
                // echo '<p><strong>Visualizações:</strong> ' . $watchCount . '</p>';
                // echo '<p><strong>Curtidas:</strong> ' . $likeCount . '</p>';
				
				 echo '<img id="fullscreen-image" src="' . $thumbnailUrl . '" alt="' . $name . '">';
				 echo '<a id="player-button" href="https://gean.me/ph-watch?v=' . $videoId . '" target="_blank"><i class="fa-solid fa-play"></i></a>';
            } else {
                echo '<img id="fullscreen-image" src="https://i.ytimg.com/vi/sJPJN_12NIw/maxresdefault.jpg" alt="">';
				echo '<a id="player-button" href="https://go.hotmart.com/A1939024g?src=gean|phembed|404|' . $videoId . '" target="_blank"><i class="fa-solid fa-play"></i></a>';
            }
        } else {
            echo '<img id="fullscreen-image" src="https://i.ytimg.com/vi/sJPJN_12NIw/maxresdefault.jpg" alt="">';
			echo '<a id="player-button" href="https://go.hotmart.com/A1939024g?src=gean|phembed|404|' . $videoId . '" target="_blank"><i class="fa-solid fa-play"></i></a>';
        }
        ?>
</body>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title><?php echo $name; ?> | <?php echo $author; ?></title>
<link rel="canonical" href="https://gean.me/ph-watch?v=<?php echo $videoId; ?>" />
<meta property="og:url" content="https://gean.me/ph-watch?v=<?php echo $videoId; ?>">
</head>
</html>