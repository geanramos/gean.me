<?php
    $name = $_GET['url'];

    // URL do Embed
    $url = 'https://www.receiteria.com.br/receita/' . $name . '/embed/';

    // Obtém o conteúdo da página
    $html = file_get_contents($url);

    // Expressão regular para extrair o postid
    $pattern = '/postid-(\d+)/';

    // Procura pelo padrão na página
    if (preg_match($pattern, $html, $matches)) {  
    
        // URL do JSON
        $json_url = 'https://www.receiteria.com.br/wp-json/oembed/1.0/embed?url=https://www.receiteria.com.br/receita/' . $name . '/';

        // Obtém o JSON
        $json_data = file_get_contents($json_url);

        // Decodifica o JSON
        $data = json_decode($json_data, true);

        // Verifica se os dados foram decodificados com sucesso
        //if ($data) {
        //    echo '<h1>' . $data['title'] . '</h1>';
        //    echo '<p><strong>Thumbnail URL:</strong> <img src="' . $data['thumbnail_url'] . '" alt="Thumbnail"></p>';
        //    echo '<p><strong>Description:</strong> ' . $data['description'] . '</p>';
        //    echo '<p><strong>Author Name:</strong> ' . $data['author_name'] . '</p>';
        //    echo '<p><strong>Author URL:</strong> ' . $data['author_url'] . '</p>';
        //    echo '<p><strong>Post Id:</strong> ' . $matches[1] . '</p>';
        //    echo '<p><strong>Thumbnail Width:</strong> ' . $data['thumbnail_width'] . '</p>';
        //    echo '<p><strong>Thumbnail Height</strong> ' . $data['thumbnail_height'] . '</p>';
        //} else {
        //    echo 'Erro ao carregar os dados.';
        //}
        // URL da imagem
        $urlImgName = $data['thumbnail_url'];
        
        // Obtém o nome do arquivo da URL
        $imgName = basename($urlImgName);
        // Exibe o nome do arquivo
        //echo '<p><strong>Img Name</strong> ' . $imgName . '</p>';

        // Verifica se $matches está definido antes de usá-lo
        if (isset($matches[1])) {
            // URL da página
            $url = 'https://www.receiteria.com.br/imprimir/?id=' . $matches[1] . '';

            // Obtém o conteúdo da página
            $html = file_get_contents($url);

            // Define o padrão de início e fim
            $pattern_start = '/<p><i class="fa-solid fa-clock">/';
            $pattern_end = '/<hr>/';
            
            // Substitui as ocorrências de 'www.receiteria.com.br' por 'gean.me'
            $html = str_replace('www.receiteria.com.br', 'gean.me', $html);
            $html = str_replace('youtube.com', 'gean.me', $html);
            $html = str_replace('input class="form-check-input" type="checkbox" value ', '', $html);
            $html = str_replace('"><label for="ingrediente-', '', $html);
            $html = str_replace('</label>', '', $html);
            $html = str_replace('fa-solid fa-bread-slice', 'fa-solid fa-utensils', $html);
            $html = str_replace('<h2>', '<h1 class="c0" id="h.kohekexff2nx"><span>', $html);
            $html = str_replace('</h2>', '</span></h1>', $html);
            $html = str_replace('Receiteria', 'Gean Ramos', $html);

            // Procura pelo padrão de início
            if (preg_match($pattern_start, $html, $start_match, PREG_OFFSET_CAPTURE)) {
                // Procura pelo padrão de fim
                if (preg_match($pattern_end, $html, $end_match, PREG_OFFSET_CAPTURE, $start_match[0][1])) {
                    // Extrai o conteúdo entre os padrões de início e fim
                    $content = substr($html, $start_match[0][1], $end_match[0][1] - $start_match[0][1]);
                    
                    // Exibe o conteúdo
                    // echo $content;
                //} else {
                    // Se não encontrar o padrão de fim, exibe uma mensagem de erro
                   // echo "Padrão de fim não encontrado.";
                }
            //} else {
                // Se não encontrar o padrão de início, exibe uma mensagem de erro
                //echo "Padrão de início não encontrado.";
            }
        }
    }
?>

<?php
// Obtém a data atual no formato desejado
$DateDia = date("Y-m-d");

// Exibe a data atual
// echo $DateDia;
?><html><head><title><?php echo $data['title']; ?></title><meta content="text/html; charset=UTF-8" http-equiv="content-type"><style type="text/css">@import url(https://themes.googleusercontent.com/fonts/css?kit=jcFLf8ZX0K0voV0Wtl8DVwWg0g-wft8BWv_rYzdOKxw);ol{margin:0;padding:0}table td,table th{padding:0}.c5{color:#000000;font-weight:320;text-decoration:none;vertical-align:baseline;font-size:16pt;font-family:"Poppins";font-style:normal}.c0{padding-top:0pt;padding-bottom:0pt;line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}.c8{color:#000000;font-weight:700;text-decoration:none;vertical-align:baseline;font-size:24pt;font-family:"Poppins";font-style:normal}.c3{padding-top:0pt;padding-bottom:3pt;line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}.c2{color:#000000;font-weight:700;text-decoration:none;vertical-align:baseline;font-size:32pt;font-family:"Poppins";font-style:normal}.c7{color:#000000;font-weight:700;text-decoration:none;vertical-align:baseline;font-size:24pt;font-family:"Poppins";font-style:normal}.c6{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:left}.c1{background-color:#ffffff;max-width:391.2pt;padding:14.2pt 14.2pt 14.2pt 14.2pt}.c4{height:24pt}.title{padding-top:0pt;color:#000000;font-weight:700;font-size:32pt;padding-bottom:3pt;font-family:"Poppins";line-height:0.8;page-break-after:avoid;orphans:2;widows:2;text-align:left}.subtitle{padding-top:0pt;color:#666666;font-size:15pt;padding-bottom:16pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}li{color:#000000;font-size:16pt;font-family:"Poppins"}p{margin:0;color:#000000;font-size:16pt;font-family:"Poppins"}h1{padding-top:0pt;color:#000000;font-weight:700;font-size:24pt;padding-bottom:0pt;font-family:"Poppins";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h2{padding-top:18pt;color:#000000;font-weight:700;font-size:24pt;padding-bottom:6pt;font-family:"Poppins";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h3{padding-top:16pt;color:#434343;font-size:14pt;padding-bottom:4pt;font-family:"Poppins";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h4{padding-top:14pt;color:#666666;font-size:12pt;padding-bottom:4pt;font-family:"Poppins";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h5{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Poppins";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h6{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Poppins";line-height:1.15;page-break-after:avoid;font-style:italic;orphans:2;widows:2;text-align:left}</style></head><body class="c1 doc-content"> <p class="c3 title" id="h.24fsotvrra0c"> <span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 500px; height: 281px;"> <img alt="" src="https://images.weserv.nl/?url=gean.me/wp-content/uploads/<?php echo $imgName; ?>&w=500&h=281&output=jpg&q=80&t=square" style="width: 500px; height: 281px; margin-left: 0.00px; margin-top: 0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title=""> </span> </p><br> <p class="c3 title" id="h.hbcswof991z4"> <span class="c2"><?php echo $data['title']; ?></span> </p> <p class="c6"> <span class="c5"><?php echo $content; ?></span> </p> <hr></hr> </body> </html>