<?php
$copyImg = $_GET["img"];
// URL da imagem a ser copiada
 $image_url = "https://images.weserv.nl/?w=320&h=180&output=jpeg&q=80&t=square&url=www.receiteria.com.br/wp-content/uploads/$copyImg";

// Lê o conteúdo da imagem
$image_data = file_get_contents($image_url);

if ($image_data !== false) {
    // Obtém o nome do arquivo da URL
    $file_name = basename($image_url);

    // Salva o conteúdo da imagem em um novo arquivo
    $saved = file_put_contents($file_name, $image_data);

    if ($saved !== false) {
        echo "https://gean.me/cdn/$file_name";
    } else {
        // Erro ao salvar a imagem.
        echo "https://cdn.jsdelivr.net/gh/geanramos/files/no-img.png?esave";
    }
} else {
    // Erro ao obter a imagem.
    echo "https://cdn.jsdelivr.net/gh/geanramos/files/no-img.png?ebusca";
}
?>
