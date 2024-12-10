<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Gerador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        p {
            margin: 10px 0;
            color: #666;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resultado do Gerador</h2>
        <?php
        // Função para gerar uma keyword aleatória
        function gerarKeyword() {
            // Aqui você pode definir seu próprio algoritmo para gerar keywords
            // Neste exemplo, estou usando uma combinação aleatória de letras e números
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $tamanho = 6; // Tamanho da keyword
            $keyword = '';
            for ($i = 0; $i < $tamanho; $i++) {
                $index = rand(0, strlen($caracteres) - 1);
                $keyword .= $caracteres[$index];
            }
            return $keyword;
        }

        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se a URL longa foi fornecida
            if (!empty($_POST["url"])) {
                // Obtém a URL longa do formulário
                $urlLonga = $_POST["url"];

                // Gera a keyword
                $keyword = gerarKeyword();

                // Define o título como a keyword gerada
                $titulo = $keyword;

                // Obtém a data atual
                $timestamp = date("Y-m-d");

                // Exibe os dados gerados
                echo "<p>{<br>&nbsp;&nbsp;&quot;keyword&quot;: &quot;$keyword&quot;,<br>&nbsp;&nbsp;&quot;url&quot;: &quot;$urlLonga&quot;,<br>&nbsp;&nbsp;&quot;title&quot;: &quot;$titulo&quot;,<br>&nbsp;&nbsp;&quot;timestamp&quot;: &quot;$timestamp&quot;<br>}</p>";
            } else {
                // Se a URL longa não foi fornecida, exibe uma mensagem de erro
                echo "<p style='color: red;'>Por favor, forneça uma URL longa.</p>";
            }
        }
        ?>
        <!-- Formulário para inserir a URL longa -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="url">URL Longa:</label><br>
            <input type="text" id="url" name="url" required><br><br>
            <input type="submit" value="Encurtar URL">
        </form>
    </div>
</body>
</html>
