<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
<body>
<style> body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; display: flex; justify-content: center; align-items: center; background-color: #000; } #fullscreen-image { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; object-fit: cover; } #player-button { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: block; width: 100px; height: 100px; border-radius: 50%; background-color: rgba(255, 255, 255, 0.7); text-align: center; line-height: 100px; text-decoration: none; color: #000; font-weight: bold; font-size: 32px; transition: all 0.3s ease; } #player-button:hover { background-color: rgba(255, 255, 255, 0.9); transform: translate(-50%, -50%) scale(1.1); } </style>
<?php
$id = $_GET["v"];
// URL do serviço oEmbed do YouTube com parâmetro ?url=
$oembed_url = "https://www.youtube.com/oembed/?url=https://www.youtube.com/watch?v=" . $id;

// Fazendo a solicitação HTTP para obter o JSON com cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $oembed_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// Verificando se houve algum erro na solicitação
if(curl_errno($ch)) {
    echo 'Erro ao obter dados: ' . curl_error($ch);
    exit;
}

// Fechando a conexão cURL
curl_close($ch);

// Decodificando o JSON para um array associativo
$data = json_decode($response, true);

// Verificando se o JSON foi decodificado com sucesso
if($data === null) {
 echo '<img id="fullscreen-image" src="https://i.ytimg.com/vi/sJPJN_12NIw/maxresdefault.jpg" alt="">';
 echo '<a id="player-button" href="https://go.hotmart.com/A1939024g?src=gean|embed|404|' . $id . '" target="_blank"><i class="fa-solid fa-play"></i></a>';
    exit;
}

// Acessando as informações desejadas
$title = $data['title'];
$author_name = $data['author_name'];

// Exibindo as informações obtidas
 echo '<img id="fullscreen-image" src="https://images.weserv.nl/?url=i.ytimg.com/vi/' . $id . '/sddefault.jpg&w=640&h=360&output=webp&q=80&t=square" alt="' . $title . '">';
 echo '<a id="player-button" href="https://gean.me/watch?v=' . $id . '" target="_blank"><i class="fa-solid fa-play"></i></a>';
?>
</body>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title><?php echo $title; ?> | <?php echo $author_name; ?></title>
<link rel="canonical" href="https://gean.me/watch?v=<?php echo $id; ?>" />
<meta property="og:url" content="https://gean.me/watch?v=<?php echo $id; ?>">
</head>
</html>