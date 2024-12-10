<?php
// Verifique se o parâmetro 'p' está definido na URL
if (isset($_GET["p"])) {
    // Defina o valor do parâmetro 'p'
    $id = $_GET["p"];

    // Construa a URL com o parâmetro '?p='
    $url = 'https://gean.me/receita/feedg.php?p=' . urlencode($id);

    // Obtenha o conteúdo JSON da URL
    $jsonData = file_get_contents($url);

    // Decodifique os dados JSON
    $data = json_decode($jsonData, true);

    // Converta modified_time para o formato especificado
    $modifiedTime = strtotime($data['modified_time']);
    $formattedModifiedTime = date('D, d M Y H:i:s -0300', $modifiedTime);
    
    // Defina o fuso horário para o Brasil/São Paulo
    date_default_timezone_set('America/Sao_Paulo');
    
    // Obtenha a data e hora atual no formato desejado
    $formattedDate = date('D, d M Y H:i:s O');
    
    // Exiba a data formatada
    // echo $formattedDate;



    // Exibir as informações como HTML
    echo '<!DOCTYPE html>';
    echo '<html lang="pt-BR">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<title>' . htmlspecialchars($data['title']) . '</title>';
    echo '</head>';
    echo '<body>';
    echo '<pre><code>';
    echo '&lt;item&gt;' . PHP_EOL;
    echo '    &lt;title&gt;' . htmlspecialchars($data['title']) . '&lt;/title&gt;' . PHP_EOL;
    echo '    &lt;link&gt;' . htmlspecialchars($data['canonical_link']) . '&lt;/link&gt;' . PHP_EOL;
    echo '    &lt;description&gt;' . htmlspecialchars($data['description']) . '&lt;/description&gt;' . PHP_EOL;
    echo '    &lt;pubDate&gt;' . $formattedDate . '&lt;/pubDate&gt;' . PHP_EOL;
    echo '    &lt;guid isPermaLink="false"&gt;' . htmlspecialchars($data['canonical_link']) . '#top&lt;/guid&gt;' . PHP_EOL;
    echo '    &lt;enclosure url="' . htmlspecialchars($data['image_url']) . '" type="image/jpeg" length="11700"/&gt;' . PHP_EOL;
    echo '&lt;/item&gt;' . PHP_EOL;
    echo '</code></pre>';
    echo '</body>';
    echo '</html>';
} else {
    // Caso o parâmetro 'p' não esteja definido na URL, exibir uma mensagem de erro
    echo 'Parâmetro "p" não foi fornecido na URL.';
}
?>
