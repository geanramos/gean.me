<!DOCTYPE html>
<html>
<head>
    <title>Obter Parâmetros da URL</title>
    <meta charset="UTF-8">
</head>
<body>
<?php
// Verificar se o parâmetro "payment_id" está presente na URL
if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];
}

// Verificar se o parâmetro "external_reference" está presente na URL
if (isset($_GET['external_reference'])) {
    $external_reference = $_GET['external_reference'];

    // Montar a URL do WhatsApp com os parâmetros
    $whatsapp_url = 'https://api.whatsapp.com/send?phone=5591982510830&text=*Detalhes%20do%20pagamento*%0Aproduto:%20E-book%20-%20M%C3%A9todo%20Secar%20Barriga%0AC%C3%B3digo%20de%20pagamento:%20' . $payment_id . '%0AC%C3%B3digo%20do%20produto:%20' . $external_reference . '%0AAtrav%C3%A9s%20do:%20Mercado%20Pago%0A%0AFavor%20confirme%20o%20pagamento%0Ae%20me%20envie%20o%20e-book.%0AE-mail%20que%20usei%20na%20hora%20da%20compra%0Afoi%20este%20aqui:%20*DIGITE%20SEU%20EMAIL%20AQUI*';

    echo "Chame no <a href=\"" . $whatsapp_url . "\"  target=\"_blank\">WhatsApp</a>";
}
?>
</body>
</html>