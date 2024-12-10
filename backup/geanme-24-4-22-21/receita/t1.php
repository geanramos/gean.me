<?php

// Obtenha a URL completa
$urlAtual = $_SERVER['REQUEST_URI'];

// Extraia a parte da URL após "https://gean.me/receita/"
$codigo = str_replace("https://gean.me", "", $urlAtual);

// Remova todas as ocorrências de "/"
$codigo = str_replace("/receita/", "", $codigo);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Fogo na Cozinha - <?php echo $codigo; ?></title>
 <meta property="og:url" content="https://gean.me/receita/<?php echo $codigo; ?>" />
</head>
<body>
 </body>
</html>
