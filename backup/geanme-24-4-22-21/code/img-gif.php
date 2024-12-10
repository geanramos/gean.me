<?php
// Carrega o conteúdo do arquivo JSON
$json_data = file_get_contents('https://cdn.jsdelivr.net/gh/geanramos/files@master/imagens.json');

// Decodifica o conteúdo JSON para um array associativo
$data = json_decode($json_data, true);

// Obtém um índice aleatório entre 0 e o número total de imagens
$index = rand(0, count($data['imagens']) - 1);

// Obtém os dados da imagem correspondente ao índice aleatório
$imagem = $data['imagens'][$index];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagem Aleatória</title>
</head>

<body>
    <h1>Imagem Aleatória: <?php echo $imagem['titulo']; ?></h1>
    <a href="<?php echo $imagem['link']; ?>" target="_blank">
        <img src="<?php echo $imagem['imagem']; ?>" alt="<?php echo $imagem['titulo']; ?>">
    </a>
</body>

</html>
