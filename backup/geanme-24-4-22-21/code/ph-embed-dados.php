<?php
// Incluir a biblioteca PHP Simple HTML DOM Parser
require 'vendor/autoload.php';

use Sunra\PhpSimple\HtmlDomParser;

// URL da página que contém os dados
$url = 'https://pt.pornhub.com/embed/ph6256f9be3ac1c';

// Obter o conteúdo da página
$html = file_get_contents($url);

// Criar um objeto DOM a partir do conteúdo HTML
$dom = HtmlDomParser::str_get_html($html);

// Inicializar variáveis para armazenar os dados extraídos
$related_url = '';
$image_url = '';
$videoUrl = '';

// Encontrar o bloco de JavaScript com os dados desejados
$scripts = $dom->find('script');

foreach ($scripts as $script) {
    // Verificar se o script contém os dados desejados
    if (strpos($script->innertext, 'var flashvars =') !== false) {
        // Extrair o bloco de JavaScript
        $jsBlock = $script->innertext;

        // Usar expressão regular para extrair os dados
        $pattern = '/var flashvars = (.*?);/';
        preg_match($pattern, $jsBlock, $matches);

        if (!empty($matches[1])) {
            // Decodificar o JSON para obter os dados
            $data = json_decode($matches[1]);

            // Extrair os dados relevantes
            if (isset($data->related_url)) {
                $related_url = $data->related_url;
            }
            if (isset($data->image_url)) {
                $image_url = $data->image_url;
            }
            if (isset($data->mediaDefinitions[0]->videoUrl)) {
                $videoUrl = $data->mediaDefinitions[0]->videoUrl;
            }
        }

        break; // Parar após encontrar o bloco de JavaScript
    }
}

// Exibir os dados extraídos
echo "related_url: $related_url<br>";
echo "image_url: $image_url<br>";
echo "videoUrl: $videoUrl<br>";

// Limpar o objeto DOM
$dom->clear();
?>
