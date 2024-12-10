<?php
// URL da página a ser copiada
$url = 'https://www.receiteria.com.br/imprimir/?id=239200';

// Obtenha o conteúdo HTML da página
$html = file_get_contents($url);

// Extrai o texto entre as tags <div id="print"> e </div>
if (preg_match('/<div id="print">(.*?)<\/div>/s', $html, $matches)) {
    // Imprime o texto encontrado
    echo $matches[1];
} else {
    echo "Elemento '#print' não encontrado.";
}
?>
