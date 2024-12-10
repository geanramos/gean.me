<!DOCTYPE html>
<html>
<head>
    <title>Obter URL completa</title>
</head>
<body>
    <h1>Obter URL completa</h1>

    <?php
    // Verifica se a solicitação está usando HTTPS
    $isHTTPS = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';

    // Obter o protocolo HTTP ou HTTPS
    $protocol = $isHTTPS ? 'https://' : 'http://';

    // Obter o nome do domínio
    $host = $_SERVER['HTTP_HOST'];

    // Obter a parte da URL após o domínio
    $uri = $_SERVER['REQUEST_URI'];

    // Combina o protocolo, o nome do domínio e a parte da URL para formar a URL completa
    $urlCompleta = $protocol . $host . $uri;
    ?>

    <p>A URL completa é: <?php echo $urlCompleta; ?></p>
</body>
</html>
