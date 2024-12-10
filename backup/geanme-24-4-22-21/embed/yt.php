<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="noindex, nofollow">
        <title>Vídeo do GeanRamos</title>
        <style>
            html {
                overflow: hidden;
            }
            body {
                font: 12px Roboto, Arial, sans-serif;
                background-color: #000;
                color: #fff;
                height: 100%;
                width: 100%;
                overflow: hidden;
                position: absolute;
                margin: 0;
                padding: 0;
            }
            .video-container {
                position: relative;
                width: 100%;
                padding-bottom: 56.25%; /* Proporção 16:9 (dividir 9 por 16) */
                overflow: hidden;
            }

            .video-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            /* Opcional: ocultar barras superior e inferior do player */
            .video-container::before {
                content: "";
                position: absolute;
                width: 100%;
                height: 75%;
                background-color: transparent;
                z-index: 101;
                left: 0;
            }

            .video-container::after {
                content: "";
                position: absolute;
                width: 100%;
                height: 13%;
                background-color: transparent;
                z-index: 101;
                left: 25%;
            }

            .video-container::before {
                top: 0;
            }

            .video-container::after {
                bottom: 0;
            }
        </style>
    </head>
    <body>
        <div class="video-container">

<?php
// Verifica se o parâmetro 'v' está presente na URL
if (isset($_GET['v']) && !empty($_GET['v'])) {
    $id = $_GET['v'];
    echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/$id?rel=0&mute=1&showinfo=0&autoplay=1&loop=0' title='GeanRamos video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen ></iframe>";
} else {
    echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/TxT9y3SI2CA?rel=0&mute=1&showinfo=0&autoplay=1&loop=0' title='GeanRamos video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen ></iframe>";
}
?>
        </div>
    </body>
</html>