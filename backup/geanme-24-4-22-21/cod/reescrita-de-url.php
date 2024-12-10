<!DOCTYPE html>
<html>
<head>
    <title>Reescrever URL</title>
</head>
<body>
    <h1>Reescrever URL</h1>

    <?php
    $url = 'https://gean.me/channel/?c=UC43nsQHUiTT2na67yM796HQ';

    $parsedUrl = parse_url($url);
    $queryParams = array();
    parse_str($parsedUrl['query'], $queryParams);

    $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'] . '/' . $queryParams['c'];

    echo "URL original: $url <br>";
    echo "Nova URL: $newUrl";
    ?>
</body>
</html>
