
<html>
  <head>
    <title>Gean Ramos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,700&display=swap" rel="stylesheet"/>
    <script>
        var params = new URLSearchParams(window.location.search);
        var redirectUrl = params.get("url");

        if (!redirectUrl && (document.referrer != "https://geanramos.com/" || document.referrer != "https://gean.me/")) {
            window.location.replace("https://50x.com.br");
        } else {
            window.location.replace(redirectUrl);
        }
    </script>
  </head>
</html>