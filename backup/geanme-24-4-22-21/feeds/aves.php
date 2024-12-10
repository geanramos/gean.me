<?php
// URL da página que queremos copiar e modificar
$url = 'https://www.receiteria.com.br/aves/feed/';

// Obtém o conteúdo da URL
$content = file_get_contents($url);

// Substitui todas as ocorrências de "www.receiteria.com.br" por "gean.me"
$content = str_replace('www.receiteria.com.br', 'gean.me', $content);
$content = str_replace('Receiteria', 'Fogo na Cozinha', $content);
$content = str_replace('https://www.youtube.com/watch?v=', 'https://gean.me/watch?v=', $content);

// Exibe o conteúdo modificado
echo $content;
?>