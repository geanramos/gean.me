<?php
// URL que contém o HTML com o script JSON embutido
$url = 'https://pt.pornhub.com/view_video.php?viewkey=65f6d3eb0be0a';
// Obtém o conteúdo HTML da URL
$html = file_get_contents($url);
// Regex para encontrar o trecho de script JSON do tipo ld+json
$pattern = '/<script type="application\/ld\+json">(.*?)<\/script>/s';
// Encontra todos os trechos de script JSON no HTML
preg_match_all($pattern, $html, $matches);
// Verifica se foram encontrados trechos JSON
if (!empty($matches[1])) {
    $jsonStrings = $matches[1];
    foreach ($jsonStrings as $jsonString) {
        // Decodifica o JSON para um array associativo
        $data = json_decode($jsonString, true);
        if ($data && isset($data['@type']) && $data['@type'] === 'VideoObject') {
            // Exibe os dados solicitados
            //echo "<strong>Nome:</strong> {$data['name']}<br>";
            //echo "<strong>Duração:</strong> {$data['duration']}<br>";
            //echo "<strong>Thumbnail URL:</strong> {$data['thumbnailUrl']}<br>";
            //echo "<strong>Data de Upload:</strong> {$data['uploadDate']}<br>";
            //echo "<strong>Descrição:</strong> {$data['description']}<br>";
            //echo "<strong>Autor:</strong> {$data['author']}<br>";
            // Procura pela interação do tipo WatchAction
            $watchAction = findInteractionStatistic($data['interactionStatistic'], 'WatchAction');
            if ($watchAction) {
                //echo "<strong>Contagem de Interações de Assistir:</strong> {$watchAction['userInteractionCount']}<br>";
            }
            // Procura pela interação do tipo LikeAction
            $likeAction = findInteractionStatistic($data['interactionStatistic'], 'LikeAction');
            if ($likeAction) {
                //echo "<strong>Contagem de Interações de Curtir:</strong> {$likeAction['userInteractionCount']}<br>";
            }
            break; // Para após encontrar o primeiro VideoObject (se houver mais de um)
        }
    }
} else {
    //echo "Não foi possível recuperar os dados.";
}
// Função para encontrar a interação estatística por tipo de interação
function findInteractionStatistic($interactionStatistics, $interactionType)
{
    foreach ($interactionStatistics as $interaction) {
        if (isset($interaction['@type']) && $interaction['@type'] === 'InteractionCounter' && isset($interaction['interactionType']) && $interaction['interactionType'] === "http://schema.org/$interactionType") {
            return $interaction;
        }
    }
    return null;
}
?>
<script type="application/ld+json">
  {
    "@context": "http://schema.org/",
    "@type": "VideoObject",
    "name": "<?php echo $data['name']; ?>",
    "duration": "<?php echo $data['duration']; ?>",
    "thumbnailUrl": "<?php echo $data['thumbnailUrl']; ?>",
    "uploadDate": "<?php echo $data['uploadDate']; ?>",
    "description": "<?php echo $data['description']; ?>",
    "author": "<?php echo $data['author']; ?>",
    "interactionStatistic": [
      {
        "@type": "InteractionCounter",
        "interactionType": "http://schema.org/WatchAction",
        "userInteractionCount": "<?php echo $watchAction['userInteractionCount']; ?>"
      },
      {
        "@type": "InteractionCounter",
        "interactionType": "http://schema.org/LikeAction",
        "userInteractionCount": "<?php echo $likeAction['userInteractionCount']; ?>"
      }
    ]
  }
</script>