<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Canal do YouTube</title>
    <style> .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; } .avatar img { max-width: 100px; border-radius: 50%; } .avatar { margin-bottom: 20px; } .keywords { font-style: italic; margin-bottom: 10px; } .link { margin-top: 10px; } </style>
</head>
<body>
<?php
// Dados do JSON
$json_data = '{
  "metadata": {
    "channelMetadataRenderer": {
      "title": "Prizza",
      "description": "Eu sou a  Prizza, tenho 24anos, me mudei para o japão em 2017 para trabalhar e morar. Neste canal compartilho minhas experiencias de vida como imigrante, alem de curiosidades, cultura e um pouco de viagens/turismo com humor e piadas *ruins*.  \nSe inscreva no canal se tu gostar e me ajude a chegar nos mil milhões de inscritos! \n\nBusiness/publicidade: contatoprizza@gmail.com\n",
      "rssUrl": "https://www.youtube.com/feeds/videos.xml?channel_id=UC43nsQHUiTT2na67yM796HQ",
      "externalId": "UC43nsQHUiTT2na67yM796HQ",
      "keywords": "",
      "ownerUrls": ["http://www.youtube.com/@Prizza"],
      "avatar": {
        "thumbnails": [{
          "url": "https://yt3.googleusercontent.com/itSBzQ9SnROY2mnk5YPSceStUZJD3Ky_y3Bi4LIEw2yu5UXy49OB9T4h65uhlN8O_ZwhS6IHgg=s900-c-k-c0x00ffffff-no-rj",
          "width": 900,
          "height": 900
        }]
      },
      "channelUrl": "https://www.youtube.com/channel/UC43nsQHUiTT2na67yM796HQ",
      "mobileBanner": {
        "thumbnails": [{
          "url": "https://yt3.googleusercontent.com/KBEYva5LMppjI_2q1zAZdpF-fIAtuLQRDp3nc5A02i1YdCGVxdAmOp3-vnQJwHjhVvj5SXpv=w600-fcrop64=1,32b75a57cd48a5a8-k-c0xffffffff-no-nd-rj",
          "width": 600,
          "height": 164
        }]
      }
    }
  }
}';

// Decodifica os dados JSON para um array associativo
$data = json_decode($json_data, true);

// Verifica se os dados existem
if (isset($data['metadata']['channelMetadataRenderer'])) {
    $metadata = $data['metadata']['channelMetadataRenderer'];
    $title = $metadata['title'];
    $description = $metadata['description'];
    $rssUrl = $metadata['rssUrl'];
    $externalId = $metadata['externalId'];
    $keywords = $metadata['keywords'];
    $ownerUrls = implode(', ', $metadata['ownerUrls']);
    $avatarUrl = $metadata['avatar']['thumbnails'][0]['url'];
    $channelUrl = $metadata['channelUrl'];
    $mobileBannerUrl = $metadata['mobileBanner']['thumbnails'][0]['url'];
?>
    <div class="container">
        <div class="mobileBanner">
            <img src="<?php echo $mobileBannerUrl; ?>" alt="<?php echo $title; ?>">
        </div>
        <div class="avatar">
            <img src="<?php echo $avatarUrl; ?>" alt="<?php echo $title; ?>">
        </div>
		<div class="link"><a href="<?php echo $channelUrl; ?>" target="_blank">Visitar Canal</a></div>
        <div class="title"><?php echo $title; ?></div>
        <div class="description"><?php echo $description; ?></div>
        <div class="keywords">Palavras-chave: <?php echo $keywords; ?></div>
        <div class="rssUrl">RSS URL: <?php echo $rssUrl; ?></div>
        <div class="externalId">ID Externo: <?php echo $externalId; ?></div>
        <div class="ownerUrls">URLs do Proprietário: <?php echo $ownerUrls; ?></div>
        <div class="channelUrl">URL do Canal: <?php echo $channelUrl; ?></div>
    </div>
<?php
} else {
    echo "Dados não encontrados.";
}
?>
</body>
</html>