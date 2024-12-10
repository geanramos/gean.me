<?php
// Caminho da imagem original
$imgUrl = $_GET["img"];

// Carrega a imagem original
$imagem = imagecreatefromjpeg($imgUrl);

// Dimensões da imagem original
$larguraOriginal = imagesx($imagem);
$alturaOriginal = imagesy($imagem);

// Define as coordenadas do recorte
$x = 100; // Coordenada X do ponto inicial do recorte
$y = 100; // Coordenada Y do ponto inicial do recorte
$largura = 200; // Largura do recorte
$altura = 150; // Altura do recorte

// Cria uma nova imagem com as dimensões do recorte
$novaImagem = imagecreatetruecolor($largura, $altura);

// Recorta a região desejada da imagem original e redimensiona para a nova imagem
imagecopyresampled($novaImagem, $imagem, 0, 0, $x, $y, $largura, $altura, $largura, $altura);

// Salva a nova imagem em um arquivo
imagejpeg($novaImagem, 'https://gean.me/cod/recortada.jpg', 100);

// Libera a memória utilizada pelas imagens
imagedestroy($imagem);
imagedestroy($novaImagem);

echo 'Imagem recortada com sucesso!';
?>
