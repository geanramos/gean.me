<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Carregando...</title>
    <style>
        body {
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #content {
            text-align: center;
        }

        #centeredImage {
            width: 300px;
            height: 250px;
            display: block;
            margin: 0 auto;
        }

        #followButton {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: white;
            color: black;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove sublinhado do link */
        }

        #followButton:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div id="content">
        <!-- Imagem com link -->
        <a href="#" target="_blank">
            <img id="centeredImage" src="https://cdn.dribbble.com/users/497338/screenshots/4314763/media/0c6762495edeb0ede3f5de16ddfc7196.gif" alt="ADS" />
        </a>
        
        <!-- Botão com link -->
    <?php
    // Verifica se o parâmetro 'v' foi passado na URL
    if (isset($_GET['v'])) {
        // Obtém e exibe o valor do parâmetro 'v'
        $id = $_GET['v'];
        echo "<p><a href='./ph-watch.php?v=$id' id='followButton'>Ir para o Vídeo</a></p>";
    } else {
        // Se o parâmetro 'v' não foi passado, exibe uma mensagem de erro
        echo "<p><a href='./ph-watch.php' id='followButton'>Ir para o Vídeo</a></p>";
    }
    ?>
    </div>
</body>
</html>