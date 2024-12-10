
<?php
$id = $_GET["v"];
// URL da página onde queremos encontrar a URL desejada
$url = "https://pt.pornhub.com/embed/" . $id;

// Inicializa o cURL
$curl = curl_init($url);

// Configura as opções do cURL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Executa a requisição e obtém o conteúdo da página
$html = curl_exec($curl);

// Verifica se houve algum erro na requisição
if ($html === false) {
    die('Erro ao acessar a URL');
}

// Fecha a sessão cURL
curl_close($curl);

// Encontra o trecho JavaScript com as definições de mídia (mediaDefinitions) usando expressão regular
$pattern = '/var flashvars = ({.*?});/s';

if (preg_match($pattern, $html, $matches)) {
    // Decodifica o JSON encontrado para um array associativo
    $flashvarsJson = $matches[1];
    $flashvars = json_decode($flashvarsJson, true);

    // Verifica se existem definições de mídia (mediaDefinitions) no objeto flashvars
    if (isset($flashvars['mediaDefinitions']) && is_array($flashvars['mediaDefinitions'])) {
        // Procura pela URL desejada dentro das definições de mídia
        foreach ($flashvars['mediaDefinitions'] as $mediaDefinition) {
            if (
                isset($mediaDefinition['defaultQuality']) &&
                $mediaDefinition['defaultQuality'] === false &&
                isset($mediaDefinition['format']) &&
                $mediaDefinition['format'] === 'mp4' &&
                isset($mediaDefinition['videoUrl'])
            ) {
                // URL desejada encontrada
                $desiredUrl = $mediaDefinition['videoUrl'];
                //echo 'URL completa desejada: ' . $desiredUrl;
                break; // Encerra o loop, pois encontramos a URL desejada
            }
        }
    } else {
        echo 'Definições de mídia não encontradas no objeto flashvars.';
    }
} else {
    echo 'Trecho JavaScript não encontrado na página.';
}
?>

<?php
// URL do arquivo JSON
$url2 = "$desiredUrl";

// Obtém o conteúdo JSON da URL
$json = file_get_contents($url2);

// Substituir o endereço IP na URL obtida
//$desiredUrlSubstituida = str_replace('185.27.134.193', '191.36.143.206', $desiredUrl);

// Verifica se o conteúdo foi obtido com sucesso
if ($json === false) {
    die('Erro ao acessar a URL');
}

// Decodifica o JSON para um array associativo
$data = json_decode($json, true);

// Verifica se a decodificação foi bem-sucedida
if ($data === null) {
    die('Erro ao decodificar o JSON');
}

// Verifica se há elementos no array de dados
if (empty($data)) {
    die('Nenhum dado encontrado no JSON');
}

// Itera sobre os elementos no array de dados
foreach ($data as $item) {
    // Verifica se o item contém o campo "videoUrl"
    if (isset($item['videoUrl'])) {
        // Obtém a URL do vídeo
        $videoUrl = $item['videoUrl'];
        
        // Imprime a URL do vídeo
        echo 'URL do vídeo: ' . $videoUrl . PHP_EOL;
    } else {
        echo 'Campo "videoUrl" não encontrado no item' . PHP_EOL;
    }
}
?>

<!--
><(((('>
╔═╗╔═╗╔═╗╔╗╔ ╔╦╗╔═╗
║ ╦║╣ ╠═╣║║║ ║║║║╣ 
╚═╝╚═╝╩ ╩╝╚╝o╩ ╩╚═╝
-->
<!DOCTYPE html>
<html>
<head>
<title>Video Player plyr.js</title>
<link rel="stylesheet" href="https://unpkg.com/plyr@3.7.8/dist/plyr.css" />
<script src="https://unpkg.com/plyr@3.7.8/dist/plyr.polyfilled.js"></script>
<script src="https://unpkg.com/plyr@3.7.8/src/js/plugins/youtube.js"></script>
<script src="https://unpkg.com/plyr@3.7.8/src/js/fullscreen.js"></script>
<link rel="icon" href="https://cdn.plyr.io/static/icons/favicon.ico" />
<style>
/* Estilo para o contêiner */
html {
    overflow: hidden;
}
body {
    font: 12px Roboto, Arial, sans-serif;
    background-color: #000;
    color: #fff;
    height: 100%;
    width: 100%;
    overflow: hidden;
    position: absolute;
    margin: 0;
    padding: 0;
}

.container {
    position: relative;
    width: 100%;
    height: 100vh; /* Altura igual à altura da janela visível */
    overflow: hidden; /* Oculta o conteúdo fora do contêiner */
    display: flex;
    background-color: #000; /* Cor de fundo preta */
}

/* Estilo para o vídeo dentro do contêiner */
.container video {
    width: 100%; /* Ocupa toda a largura do contêiner */
    height: auto; /* Altura ajustada automaticamente */
}

/* Estilo para o pôster do vídeo (imagem de pré-visualização) */
.container video::poster {
    width: 100%;
    height: auto;
    object-fit: cover; /* Cobrir todo o espaço do vídeo */
    justify-content: center; /* Centraliza o vídeo horizontalmente */
    align-items: center; /* Centraliza o vídeo verticalmente */
}
</style>
</head>
<body>

<div class="container">
<video id="player" playsinline controls poster="https://i1.wp.com/blog.emania.com.br/wp-content/uploads/2016/04/blurrycalle.jpg?resize=1920,1080">
  <source src="<?php echo $videoUrl; ?>" type="video/mp4" />
</video>

</div>

</body>
</html>

