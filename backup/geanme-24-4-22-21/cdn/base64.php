<?php

// Obtenha a URL da imagem
$urlImagem = isset($_GET['img']) ? $_GET['img'] : '';
if (empty($urlImagem)) {
  die("ERRO 404");
}

// Verifique se a URL da imagem é válida
if (!filter_var($urlImagem, FILTER_VALIDATE_URL)) {
  die("URL da imagem inválida");
}

// Obtenha o conteúdo da imagem
$imageData = file_get_contents($urlImagem);

// Converta a imagem em Base64
$base64Image = base64_encode($imageData);

// Exiba a imagem em Base64
echo "data:image/jpeg;base64," . $base64Image;

?>
