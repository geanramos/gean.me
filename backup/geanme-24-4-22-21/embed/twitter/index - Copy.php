<?php
// Obtém o valor do parâmetro 'v' da URL
$id = $_GET["v"];

// URL da oEmbed API do YouTube
$url = "https://www.youtube.com/oembed/?url=https://www.youtube.com/watch?v=" . $id;

// Obtém o conteúdo JSON da API
$json = file_get_contents($url);

// Decodifica o JSON para um array associativo
$data = json_decode($json, true);

// Verifica se o JSON foi decodificado com sucesso
if ($data) {
    // Verifica se o campo 'title' está presente no array
    if (isset($data['title'])) {
        // Exibe o título da página
        $pageTitle = $data['title'];
		$pageAuthor = $data['author_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=5.0,user-scalable=yes">
    <title>Gean Ramos - <?php echo $pageTitle; ?></title>
	<meta property="og:url" content="https://gean.me/watch?v=<?php echo $id; ?>">
	<link rel="canonical" href="https://gean.me/watch?v=<?php echo $id; ?>">
    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/jwplayer.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/provider.html5.js"></script>
    <script>jwplayer.key = "IMtAJf5X9E17C1gol8B45QJL5vWOCxYUDyznpA==";</script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/skins/seven.css">
    <style>html, body{height: 100%; width: 100%; margin: 0; overflow: hidden;}</style>
</head>
<body>
    <div id="video"></div>
    <script type="text/JavaScript">
        var playerInstance = jwplayer("video");
        playerInstance.setup({
            image: "https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $id; ?>/sddefault.jpg&w=1280&h=720&output=jpg&q=80&t=square",
            file: "https://www.youtube.com/watch?v=<?php echo $id; ?>",
            mute: "false",
            autostart: "false",
            repeat: "false",
            abouttext: "Acesse",
            aboutlink: "https://formulanegocioonline.u1m.com.br",
            height: "100%",
            width: "100%",
            stretching: "uniform",
            primary: "html5",
            flashplayer: "https://cdn.jsdelivr.net/gh/geanramos/files/jwplayer-7.8.2/jwplayer.flash.swf",
            preload: "metadata",
            skin: {
                name: "seven",
                active: "#0099ff",
                inactive: "#f9f9f9",
                background: "#000000"
            },
            logo: {
                file: "https://i1.wp.com/formulanegocioonline.50x.com.br/logo-fno1.png?resize=122,50",
                hide: "false",
                link: "https://formulanegocioonline.u1m.com.br",
                margin: "15",
                position: "top-right",
            }
        });
    </script>
</body>
</html>