<?php
// Obtém o valor do parâmetro 'q' da URL
$id = $_GET["q"];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisando por <?php echo $id; ?></title>
	<script language="JavaScript">window.location="https://www.google.com/search?q=<?php echo $id; ?>+site:gean.me&hl=pt-BR";</script>
	<!--<meta http-equiv="refresh" content="0; URL='https://www.google.com/search?q=<?php echo $id; ?>+site:gean.me&hl=pt-BR'" />-->
	<link rel="shortcut icon" href="https://gean.me/favicon.ico">
</head>
<body>
    <header>
        <h1>Pesquisando por <?php echo $id; ?></h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </nav>
    
    <main>
        <h2>Tudo sobre: <?php echo $id; ?></h2>
        <p>CARREGANDO...</p>
    </main>
    
    <footer>
        <p>&copy; 2024 - Todos os direitos reservados</p>
    </footer>
</body>
</html>
