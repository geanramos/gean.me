-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql310.infinityfree.com
-- Tempo de geração: 22/01/2024 às 18:53
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_31476613_Yourls`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `yourls_url`
--

CREATE TABLE `yourls_url` (
  `keyword` varchar(100) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `url` text COLLATE utf8mb4_bin NOT NULL,
  `title` text COLLATE utf8mb4_bin DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(41) COLLATE utf8mb4_bin NOT NULL,
  `clicks` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Despejando dados para a tabela `yourls_url`
--

INSERT INTO `yourls_url` (`keyword`, `url`, `title`, `timestamp`, `ip`, `clicks`) VALUES
('01z-', 'https://thestoriesccc.substack.com/p/a-primeira-de-todas', 'https://thestoriesccc.substack.com/p/a-primeira-de-todas', '2022-11-12 06:39:54', '172.70.54.181', 13),
('06ax', 'https://linkr.bio/sahaalah', 'Sahaalah Berkah Safar Linkr.Bio', '2022-04-29 02:55:26', '172.68.25.204', 233),
('0iae', 'https://gean.me/yt/zcpec1GJSuk', 'Comunidade: Oney Araujo de Conteúdo', '2022-05-02 18:04:22', '172.68.18.31', 78),
('1tnp', 'https://temas.in/tema/wild/?fbclid=IwAR2uA_iT-oNTaMBkjGrJwaHZtTlT_wpFk5BOsws3W5N8iRjHlk3Q-B_pJtI', 'Iuniques Themes Shop', '2022-05-09 03:55:02', '172.71.10.83', 46),
('1venda-goog-ads', 'https://geanramos.com/watch?v=5QWT88fjZVA', 'Profissão Gestor de Tráfego - v3 - Pedro Sobral', '2023-05-10 03:00:23', '172.71.234.130', 5),
('2024', 'https://docs.google.com/document/d/e/2PACX-1vR0-gfN0yLoWYk-KPxKktDUvhXKvQhxqUkGTi_8T_8JN7mknQUZ-oCV96_FULt9kpyJJEclrkPfooNL/pub', 'como ganhar dinheiro na internet em 2024', '2024-01-21 09:24:48', '172.71.234.52', 3),
('22', 'https://vote22.gean.me/', 'https://vote22.gean.me/', '2022-10-29 03:40:03', '172.71.11.90', 47),
('31y9', 'https://www.tumblr.com/floretado/727267699454099456/acredito-que-um-dia-terei-o-amor-sobre-o-qual?source=share', 'https://www.tumblr.com/floretado/727267699454099456/acredito-que-um-dia-terei-o-amor-sobre-o-qual?source=share', '2023-09-05 22:42:50', '172.68.18.116', 5),
('68pb', 'https://blog.geanramos.com/happy-christmas.html', 'https://blog.geanramos.com/happy-christmas.html', '2022-12-18 06:32:20', '172.71.11.80', 22),
('7hd-', 'https://blog.geanramos.com/tem-que-ser-reciproco.html', 'https://blog.geanramos.com/tem-que-ser-reciproco.html', '2022-12-18 07:10:53', '172.71.11.90', 24),
('8lbe', 'https://thenewscc.com.br/stories/', 'https://thenewscc.com.br/stories/', '2022-11-10 01:33:22', '172.71.10.95', 22),
('9wwt', 'https://pt.pornhub.com/view_video.php?viewkey=ph63bcd95397524', 'Marican Chanelle Anal Squirt Banged out BBC - Pornhub.com', '2023-04-06 22:33:59', '172.71.234.159', 23),
('a', 'https://pt.pornhub.com/pornstar/erin-everheart', 'Vídeos Pornôs de Erin Everheart - Perfil de Pornstar Verificado | Pornhub', '2023-05-01 00:20:32', '172.69.3.211', 379),
('acbu', 'https://gean.me/yt/DLQA_Hu-WhI', '16 Milhões com 16 anos', '2022-04-26 20:47:52', '172.71.16.149', 74),
('acredito-em-nos', 'https://geanramos.wordpress.com/2022/08/15/acredito-em-nos/', 'Acredito em Nós – Gean Ramos', '2022-10-16 05:29:21', '172.70.82.19', 51),
('al1', 'https://www.youtube.com/watch?v=0XYAJ0uOCtw&list=PLAr322Yg8UkA_TEsRNcUyrsqXIV7MIGb2', 'https://www.youtube.com/watch?v=0XYAJ0uOCtw&list=PLAr322Yg8UkA_TEsRNcUyrsqXIV7MIGb2', '2023-02-15 07:23:54', '172.70.105.165', 16),
('amor-ao-primeiro-beijo', 'https://gofilmes.me/play/m.php?Vmo1L250SUhxa0FtUDFrakphZTNudz09', 'Player', '2023-04-19 02:56:45', '172.71.6.249', 9),
('amp', 'https://playground.amp.dev/?url=https://preview.amp.dev/documentation/examples/interactivity-dynamic-content/tic_tac_toe.email&_gl=1*i9sg34*_ga*YW1wLWJ1Q1ItRVVrUEJ5Y21rbjF3LUc2d2c.&runtime=amp4email&preview=true', 'https://playground.amp.dev/?url=https://preview.amp.dev/documentation/examples/interactivity-dynamic-content/tic_tac_toe.email&_gl=1*i9sg34*_ga*YW1wLWJ1Q1ItRVVrUEJ5Y21rbjF3LUc2d2c.&runtime=amp4email&preview=true', '2022-12-26 06:29:43', '172.71.6.219', 15),
('anuncio-local-pedro', 'https://gean.me/yt/zlfb1qTj7IU', 'Anúncio para negócio local: 27 estratégias', '2022-05-01 02:43:34', '172.71.10.69', 66),
('appm', 'http://mpago.li/1su3CaL', 'Ganhei R$ 100 no Mercado Pago', '2022-05-11 16:13:03', '172.69.3.194', 79),
('aqfs', 'https://fson.link/movies?play=TzVYNWtudjFHWE0zSGcydkxPbUkyL3dCN2ZQS3hkU2wvaVhseXBQUUd5YTZXWkZyQk5jT0daa1hUMnNTSFBhdA==', 'Filme: Até que a Fuga os Separe Dublado', '2022-04-14 14:16:38', '172.71.6.195', 85),
('avata2', 'https://gofilmes.me/play/m.php?SFhNUTNUM1RTRWhmbEFiNDJKS2wxUT09', 'Player', '2023-04-18 18:00:45', '172.71.234.158', 11),
('baba', 'https://forms.gle/mwYpkM2WcJAD2hbv8', 'VAGA DE EMPREGO.', '2023-03-15 04:10:12', '172.68.19.36', 126),
('bd-relacional', 'http://gean.me/yt/SvlvhlaRCCo', 'Banco de Dados Relacional na AWS', '2022-05-08 15:33:05', '172.71.6.141', 64),
('blog', 'https://geanramos.wordpress.com/', 'Gean Ramos - Blog', '2022-04-09 15:12:24', '104.41.28.210', 482),
('blog-google-cloud', 'https://www.hostgator.com.br/blog/como-utilizar-wordpress-google-cloud/', 'Como utilizar o WordPress no Google Cloud', '2022-04-14 12:56:29', '172.71.10.147', 159),
('bsseygeknmo', 'https://gean.me/watch?v=BSSEYGEKNmo', 'https://gean.me/watch?v=BSSEYGEKNmo', '2023-06-14 17:40:56', '172.71.6.22', 4),
('cart', 'http://gean.me/yt/qVzZY5mZLYI', 'Cartoon Box - Top 20', '2022-05-23 20:08:17', '172.71.10.147', 67),
('carteira-bitcoin-antiga', 'https://paxful.com/university/pt-br/encontrar-carteira-bitcoin-perdida/', 'Como encontro a minha carteira bitcoin antiga?', '2022-04-15 05:54:53', '172.68.26.99', 249),
('cnews', 'https://chat.whatsapp.com/FHNG09NmXZo2hGa4lEuL3B', 'https://chat.whatsapp.com/FHNG09NmXZo2hGa4lEuL3B', '2023-01-03 04:03:02', '172.71.10.94', 16),
('comunidade-black', 'https://chat.whatsapp.com/Ee8VEAgkxJJAhlUwgSo4W5', 'https://chat.whatsapp.com/Ee8VEAgkxJJAhlUwgSo4W5', '2023-06-26 17:03:35', '172.70.105.172', 6),
('conta-anucio-fb', 'https://geanramos.com/watch?v=qwbULuQBwhg', 'Profissão Gestor de Tráfego - v3 - Pedro Sobral', '2023-04-26 00:10:36', '172.71.11.80', 10),
('cupper-hugo-theme', 'https://themes.gohugo.io/themes/cupper-hugo-theme/', 'https://themes.gohugo.io/themes/cupper-hugo-theme/', '2022-11-11 00:42:43', '172.70.105.152', 48),
('cursos-mktd', 'https://chinacursosonline.commercesuite.com.br/loja/catalogo.php?loja=1111764&categoria=5&pg=2', 'CURSOS MARKETING DIGITAL', '2022-04-28 14:33:15', '172.71.6.195', 70),
('cv', 'https://docs.google.com/document/d/e/2PACX-1vQ8YurmsGsaUKaV5Y1813GFWtaqQKx6TlLGuaTfHsH4I7x7xPdoiv3AA62lvbsBT2-MfgqjZesjoG5v/pub', 'curriculum vitae - CV | .doc', '2024-01-21 09:32:52', '172.68.19.123', 3),
('d3y4', 'https://memories.geanramos.com/post-07', 'https://memories.geanramos.com/post-07', '2022-12-22 12:27:14', '172.71.10.51', 18),
('deuoceb', 'https://gean.me/watch?v=deIuToceZbM', 'https://gean.me/watch?v=deIuToceZbM', '2023-06-14 17:36:57', '172.71.10.42', 6),
('doc', 'https://github.com/geanramos/geanramos.com.br/tree/main/doc', 'https://github.com/geanramos/geanramos.com.br/tree/main/doc', '2024-01-11 20:36:00', '172.69.90.238', 3),
('dorama', 'https://oneflix.one/episodios/desgraca-ao-seu-dispor-1x1/', 'Desgraça ao seu Dispor 1x1 | OneFlix HD – Filmes e Séries Online 720p Full HD 1080p 4K', '2024-01-17 04:18:50', '172.71.10.218', 2),
('drivenativo', 'https://drive.google.com/file/d/11XbT51iNyhQ_Vqv5tvQ0_uzQLhxjJkPL/view', 'Script GoogleDrive.zip - Google Drive', '2022-05-17 08:27:22', '172.68.18.205', 84),
('drop-home', 'https://ospredestinados.com.br/', 'Os Predestinados - Home', '2022-04-26 20:45:42', '172.69.3.186', 136),
('drop-ok', 'https://ospredestinados.com.br/obrigado/', 'Os Predestinados - Obrigado', '2022-04-26 20:24:57', '172.70.105.149', 66),
('dzz', 'https://deezer.page.link/x3XcBW4dbK3d5x3F8', 'Playlist [Loved tracks] Na Deezer', '2022-05-15 00:46:09', '172.71.6.195', 77),
('editor-md', 'https://stackedit.io/app', 'https://stackedit.io/app', '2022-11-24 10:00:20', '172.71.10.50', 41),
('eflq', 'https://gean.me/watch?v=CjV9RpXoHmY', 'https://gean.me/watch?v=CjV9RpXoHmY', '2023-06-18 19:55:52', '172.68.19.35', 7),
('f5k', 'https://formula5k2.club.hotmart.com/login', 'Fórmula 5K', '2022-05-08 06:04:30', '172.68.18.5', 134),
('form', 'https://docs.google.com/forms/d/e/1FAIpQLScNFtmAVg9mbo3AP4R04YS8XCQQOUqzcwT6t7nUr0BLVmDGtA/viewform', 'PRIMEIRA VENDA NO GOOGLE ADS.', '2023-05-10 08:43:20', '172.71.10.94', 96),
('google-news', 'https://kinsta.com/pt/blog/submeter-para-google-news/', 'Seu Site no Google News e Google Discover', '2022-04-14 12:39:03', '172.71.7.12', 117),
('gzap', 'https://chat.whatsapp.com/invite/KLTOXfaEwtN9mSE24aeAeT', 'Grupo no Whatsapp | Figurinhas :)', '2022-06-12 09:48:59', '172.71.10.27', 231),
('h3k1', 'https://memories.geanramos.com.br/post-13', 'Como seria o mundo se você não existisse?', '2023-11-28 03:52:42', '172.71.6.47', 6),
('homem-aranha-no-aranhaverso', 'https://playersdevideo.com/links/2023/7733779458.html', 'https://playersdevideo.com/links/2023/7733779458.html', '2023-06-16 07:07:53', '172.68.18.170', 11),
('hx0n', 'https://lnk.bio/cakeandbakexo', 'https://lnk.bio/cakeandbakexo', '2022-04-29 03:45:42', '172.68.26.109', 117),
('iptv', 'https://play.google.com/store/apps/details?id=com.mehedisoft.iptvapp_mobile', 'https://play.google.com/store/apps/details?id=com.mehedisoft.iptvapp_mobile', '2023-03-05 22:00:33', '172.68.19.131', 19),
('iptv2', 'https://iptvlist.ru/wp-content/plugins/download-attachments/includes/download.php?id=1855', 'https://iptvlist.ru/wp-content/plugins/download-attachments/includes/download.php?id=1855', '2023-03-05 22:08:41', '172.71.234.142', 15),
('irw3', 'https://linkr.bio/ganastour', 'ZOE GOTUSSO Linkr.Bio', '2022-04-29 02:23:24', '172.71.10.147', 97),
('jb-k', 'https://gean.me/yt/S9uPNppGsGo?si=emDNBkFoDFqXzYq9', 'https://gean.me/yt/S9uPNppGsGo?si=emDNBkFoDFqXzYq9', '2023-09-09 23:57:49', '172.71.16.219', 5),
('km5q', 'https://gean.me/watch?v=j7vP6skFSbk', 'https://gean.me/watch?v=j7vP6skFSbk', '2023-06-18 17:43:52', '172.68.18.56', 6),
('liq-resina', 'https://cursopisosderesina.com/', 'Curso de Porcelanato Líquido de Resina', '2022-04-18 17:38:59', '144.22.153.5', 112),
('love1', 'https://apartb-real-estate.webflow.io/blog-posts/stunning-photos-of-some-of-the-best-designed-cities', 'Template - Apartb', '2022-05-12 04:48:38', '172.68.18.213', 78),
('love2', 'https://sakuga.webflow.io/template-info/style-guide', 'Template - Sakuga', '2022-05-12 04:53:14', '172.71.10.147', 53),
('love3', 'https://oberon-template.webflow.io/posts-grid/posts-grid-1-column-b', 'Template - Oberon', '2022-05-12 04:59:14', '172.71.7.12', 66),
('lula-apoia-maduro', 'https://geanramos.wordpress.com/2022/10/22/lula-apoia-seu-amigo-democrata-nicolas-maduro/', 'Lula apoia seu amigo “democrata” Nicolás Maduro – Gean Ramos', '2022-10-23 00:12:38', '172.70.254.73', 45),
('m', 'https://memories.geanramos.com/?utm_source=shortlink&utm_id=redirect', 'The Memories', '2023-03-09 16:38:20', '172.71.10.51', 44),
('mapa', 'https://g.co/kgs/pvPn9s', 'Before you continue to Google Search', '2023-04-20 21:56:13', '172.68.19.128', 75),
('mapa1', 'https://www.google.com/maps/dir/-1.3089958,-47.9119286/Ali+Motel+For+love/@-1.3101985,-47.9163638,185m/data=!3m1!1e3!4m9!4m8!1m1!4e1!1m5!1m1!1s0x92a5a733c851d47d:0x98013f5ade654e0c!2m2!1d-47.9162758!2d-1.3104623', 'Before you continue to Google Maps', '2023-04-21 01:57:44', '172.71.16.216', 7),
('mapa2', 'https://www.google.com/maps/dir//Ali+Motel+For+love/@-1.310462,-47.9574759,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x92a5a733c851d47d:0x98013f5ade654e0c!2m2!1d-47.9162758!2d-1.3104623!5m1!1e1', 'Before you continue to Google Maps', '2023-04-21 02:02:13', '172.68.19.36', 345),
('medium', 'https://medium.com/@geanramos', 'Gean Ramos - Medium', '2022-04-09 15:12:24', '104.41.28.210', 48),
('memories', 'https://monumental-kringle-4b2c6f.netlify.app/', 'Ink - Crisp, minimal personal [blog theme for Hugo](https://github.com/knadh/hugo-ink)', '2022-11-10 00:10:58', '172.71.10.95', 17),
('mg-unsplash', 'https://unsplash.com/', 'Unsplash: banco de imagens', '2022-04-19 07:12:26', '144.22.153.5', 52),
('mini-curso', 'https://bit.ly/fno-pa-mc', 'https://bit.ly/fno-pa-mc', '2023-06-16 00:43:24', '172.68.19.166', 11),
('mini-curso-gratis', 'https://docs.google.com/forms/d/e/1FAIpQLScNFtmAVg9mbo3AP4R04YS8XCQQOUqzcwT6t7nUr0BLVmDGtA/viewform?usp=sf_link', 'Minicurso de Marketing Digital', '2023-06-16 00:45:02', '172.71.10.46', 63),
('mllx', 'http://192.168.0.16/srv1/files/html/o-prazer-da-sua-companhia.html', 'http://192.168.0.16/srv1/files/html/o-prazer-da-sua-companhia.html', '2023-03-17 19:57:25', '172.71.10.95', 22),
('mp-blackfriday', 'https://mpago.li/2UEQYAh', 'https://mpago.li/2UEQYAh', '2022-10-09 14:24:33', '172.69.3.226', 48),
('mp-point', 'https://mpago.li/2jd2rBU', 'Mercado Pago | Point com 83% de desconto', '2022-05-22 06:41:08', '172.68.18.213', 202),
('muq', 'https://cursomuquirana.blogspot.com/2016/05/como-funciona.html?m=0#3', 'Afiliado Muquirana: como funciona', '2022-05-29 15:07:20', '172.68.18.93', 65),
('music', 'https://www.deezer.com/br/profile/186653823', 'https://www.deezer.com/br/profile/186653823', '2023-09-20 00:32:56', '162.158.63.97', 4),
('net-ilimitada', 'https://api.whatsapp.com/send?phone=5591982510830&text=Quero%20contratar%20sua%20*Internet%20ilimitada*%20no%20celular%20', 'https://api.whatsapp.com/send?phone=5591982510830&text=Quero%20contratar%20sua%20*Internet%20ilimitada*%20no%20celular%20', '2022-10-14 23:48:50', '172.70.55.88', 37),
('nevoli', 'https://api.whatsapp.com/send?phone=559133110030&text=Ol%C3%A1,%20quero%20contratar%20internet%20da%20Nevoli1', 'https://api.whatsapp.com/send?phone=559133110030&text=Ol%C3%A1,%20quero%20contratar%20internet%20da%20Nevoli1', '2023-04-03 19:29:09', '172.71.11.79', 47),
('omg', 'https://redirect.geanramos.com/', 'Como Ganhar R$ 4.947,84 por dia.', '2022-04-09 15:12:24', '104.41.28.210', 67),
('p', 'https://github.com/geanramos/img.geanramos.com/raw/main/print.zip.zip', 'https://github.com/geanramos/img.geanramos.com/raw/main/print.zip.zip', '2023-01-11 21:15:25', '172.71.11.80', 23),
('p10k-30d', 'https://trafego6em7.com/imersao/', 'Venda 10k em 30 dias, com seu curso.', '2022-05-03 14:15:11', '172.68.18.211', 65),
('plr-lucrativo', 'https://jpnegocioweb.com/', 'PLR Lucrativo: O que são PLR?', '2022-05-02 13:39:46', '172.71.10.69', 89),
('porteiro', 'https://forms.gle/dPQEttND8NBYSKid8', 'VAGA DE EMPREGO.', '2023-03-11 20:10:46', '172.68.18.127', 102),
('pousada', 'https://docs.google.com/forms/d/e/1FAIpQLSc-bKXB7oAX_VzB9gYvlAUMYPk2ekdCe6EMKKseyRGTuPvjbw/viewform?usp=sf_link', 'VAGA DE EMPREGO.', '2022-12-15 20:20:48', '172.68.18.191', 258),
('pp38', 'http://yanklovinsk.blogspot.com/2015/07/eliminando-as-pedras-na-vesicula-e-no-figado-sem-cirurgia.html', 'Eliminando as Pedras na Vesícula e no Fígado Sem Cirurgia - Yan Klovinsk', '2023-08-04 07:03:06', '172.71.234.35', 4),
('proj-100k', 'https://lp.oneyaraujo.com.br/projeto-100k?utm_source=ytv&utm_medium=134828437363&utm_campaign=2022_05_P100k&utm_content=592130067596&gclid=Cj0KCQjw6pOTBhCTARIsAHF23fK5_VwlAHQHWwyl_xKhsr52ROEBdrA4bUdl9Q0XFTf1BcCArRCuZ_caAse5EALw_wcB', 'Oney Araújo: Projeto 100k', '2022-04-24 20:55:43', '172.71.10.33', 52),
('proj-100k-form', 'https://docs.google.com/forms/d/e/1FAIpQLSdGfcmcndIhKOStulBdbQDD0sxsFC5ItBeoBQZ5BivavvE5-Q/viewform?fbzx=5593091772126916020', 'Pesquisa #Projeto100k', '2022-04-24 21:14:32', '172.71.16.179', 64),
('proj-100k-ok', 'https://lp.oneyaraujo.com.br/obrigado-projeto-100k', 'Oney Araújo: Projeto 100k - Obrigado', '2022-04-24 20:57:38', '172.71.10.33', 74),
('px', 'https://aspect-ratio.desenvolvimentoparaweb.com/', 'Redimensionamento de Imagem', '2022-04-19 02:38:57', '144.22.153.5', 419),
('qn47', 'https://app.zapermenu.com.br/imprimir/modelo-marmitaria/7', 'https://app.zapermenu.com.br/imprimir/modelo-marmitaria/7', '2022-10-10 21:46:05', '108.162.237.5', 25),
('qypw', 'https://linkr.bio/BUDHART', 'BUDHART Muebles Linkr.Bio', '2022-04-29 02:34:49', '172.68.25.204', 122),
('recomendo', 'https://formulanegocioonline.50x.com.br/', 'Descubra agora como ganhar dinheiro na internet - Gean Ramos', '2024-01-21 19:32:04', '172.71.6.206', 4),
('ret-pedra-vesicula', 'http://limpezadavesicula.blogspot.com/2012/11/limpeza-da-vesicula.html', 'Tirando pedras da vesícula e do fígado SEM CIRURGIA e SEM DOR: Pedras na vesícula', '2023-08-04 06:58:35', '172.71.234.149', 7),
('rpc', 'https://receitasparasecar.50x.com.br/', 'Programa Receitas Para Secar', '2023-05-21 00:53:20', '172.70.105.149', 7),
('search-console', 'https://kinsta.com/pt/blog/google-search-console/', 'Google Search Console: Melhorando o SEO', '2022-04-14 12:33:00', '172.71.10.69', 417),
('stories', 'https://geanramos.wordpress.com/?utm_source=gean.me&utm_medium=link&utm_campaign=stories&utm_id=202211', 'Gean Ramos – Futilidades e outras milongas', '2022-11-07 08:32:41', '172.70.105.152', 102),
('sumiu-crypto', 'https://youtu.be/A2g7NSKnKoQ', 'Youtube: Como recuperar criptomoedas', '2022-04-15 05:51:40', '172.68.26.121', 68),
('taken', 'https://www.youtube.com/watch?v=f_m9wEGk20A&list=PL5jPzwC_Opgo_SEBeweQPAT4EnUFp7ig-&index=1', 'https://www.youtube.com/watch?v=f_m9wEGk20A&list=PL5jPzwC_Opgo_SEBeweQPAT4EnUFp7ig-&index=1', '2023-02-15 07:39:03', '172.70.105.165', 13),
('tbk47vji6a4', 'https://gean.me/watch?v=tbK47vJI6a4', 'https://gean.me/watch?v=tbK47vJI6a4', '2023-06-14 17:46:05', '172.71.10.95', 7),
('tcf2000', 'https://www.mercadolivre.com.br/telefone-fixo-elgin-tcf-2000-preto/p/MLB8289289?matt_tool=95410133&matt_word=&matt_source=google&matt_campaign_id=14504862875&matt_ad_group_id=134596603620&matt_match_type=&matt_network=g&matt_device=m&matt_creative=584156655561&matt_keyword=&matt_ad_position=&matt_ad_type=pla&matt_merchant_id=280292076&matt_product_id=MLB8289289-product&matt_product_partition_id=1634419448147&matt_target_id=pla-1634419448147&gclid=Cj0KCQjwhsmaBhCvARIsAIbEbH42TKRCAZVgiDQQgjy46gs1fSL66psQ_akXfODdSb8VsVZCShctEFkaAukWEALw_wcB', 'https://www.mercadolivre.com.br/telefone-fixo-elgin-tcf-2000-preto/p/MLB8289289?matt_tool=95410133&matt_word=&matt_source=google&matt_campaign_id=14504862875&matt_ad_group_id=134596603620&matt_match_type=&matt_network=g&matt_device=m&matt_creative=584156655561&matt_keyword=&matt_ad_position=&matt_ad_type=pla&matt_merchant_id=280292076&matt_product_id=MLB8289289-product&matt_product_partition_id=1634419448147&matt_target_id=pla-1634419448147&gclid=Cj0KCQjwhsmaBhCvARIsAIbEbH42TKRCAZVgiDQQgjy46gs1fSL66psQ_akXfODdSb8VsVZCShctEFkaAukWEALw_wcB', '2022-10-21 18:29:19', '172.70.82.103', 26),
('torotheme', 'https://torothemes.com/', 'Toro Themes', '2022-05-15 23:39:34', '172.71.16.149', 74),
('txtc', 'https://geanramos.wordpress.com/2022/11/03/dona-wanda-avo-de-muitos/', 'Dona Wanda – Avó de muitos – Gean Ramos', '2022-12-18 05:46:28', '172.68.18.187', 23),
('ty-x', 'https://docs.google.com/spreadsheets/d/1ABhImOo_WBoOgifDsg78JEzxzqdreqiLPBeqV-lTzR0/edit?usp=sharing', 'como ganhar dinheiro na internet - 2023-05-10 at 20_32_16 - Google Sheets', '2023-05-11 05:20:40', '172.68.19.48', 6),
('vcelpa', 'https://youtu.be/68KU9utM1LY', 'https://youtu.be/68KU9utM1LY', '2023-06-13 19:37:45', '172.71.234.70', 6),
('vender-zap', 'https://gean.me/yt/FpyZRFUGcAo', 'Vender no ZAP: Como funciona na PRÁTICA?', '2022-05-01 14:44:13', '172.68.18.145', 50),
('virtualizacao', 'https://gean.me/yt/vmoKt2zUc8A', 'Virtualização sem servidores', '2022-06-01 03:34:06', '172.71.10.33', 47),
('w2ya', 'https://linkr.bio/8z7yn', 'Prof. Alexandre Alves Linkr.Bio', '2022-04-29 02:35:57', '172.68.25.204', 91),
('wbve', 'http://bit.ly/3lYDZFy', 'http://bit.ly/3lYDZFy', '2023-02-23 02:37:51', '172.68.18.222', 20),
('win-10-222', 'https://windows-10.br.uptodown.com/windows', 'Windows 10 para Windows - Baixe gratuitamente na Uptodown', '2023-02-22 22:59:11', '172.68.18.222', 474),
('wind10-lite3', 'https://lojamdt.com/produto/windows-10-mega-lite-3-0/', 'https://lojamdt.com/produto/windows-10-mega-lite-3-0/', '2023-05-09 01:10:57', '172.68.19.15', 4),
('wpus', 'https://livecoins.com.br/brasileiro-manda-1-real-em-bitcoin-para-bilionario-via-e-mail-facil-demais/', 'Brasileiro manda 1 real em bitcoin para bilionário via e-mail: \"fácil demais\" - Livecoins', '2023-04-25 18:51:17', '172.71.10.50', 80),
('writesonic', 'https://writesonic.com/', 'Redator de IA e Assistente de Redação', '2022-05-06 20:41:19', '172.71.16.179', 70),
('xuy3', 'https://lnk.bio/natbelleza', 'https://lnk.bio/natbelleza', '2022-04-29 03:41:20', '172.68.26.109', 165),
('xxx', 'https://hornygirlsinapp.com/progress_p/utility/video-app-default/adult/dark-app-modal/1/index.html?p1=https://video.tiktrack.xyz/0c9c8857-1fe2-4492-b36f-56bb9c04366b?placement=17036598&zoneid=1798223&bannerid=2047315&campaignid=692773&subid=1ef855b3cd8a15905ac7d9c9ef3d3bbe', 'https://hornygirlsinapp.com/progress_p/utility/video-app-default/adult/dark-app-modal/1/index.html?p1=https://video.tiktrack.xyz/0c9c8857-1fe2-4492-b36f-56bb9c04366b?placement=17036598&zoneid=1798223&bannerid=2047315&campaignid=692773&subid=1ef855b3cd8a15905ac7d9c9ef3d3bbe', '2023-03-05 21:21:35', '172.71.6.126', 18),
('y', 'https://gean.me/views?v=xsd6c_L3LRU&t=1160s', 'https://gean.me/views?v=xsd6c_L3LRU&t=1160s', '2023-05-28 00:39:35', '172.70.105.169', 7),
('ycine', 'https://app.youcine.vip/app/cinetv_oficialsite.apk', 'https://app.youcine.vip/app/cinetv_oficialsite.apk', '2023-03-10 03:35:54', '172.71.10.94', 15),
('ydl8', 'https://lnk.bio/jollapr', 'https://lnk.bio/jollapr', '2022-04-29 03:51:20', '172.68.25.204', 225),
('yt-php', 'https://www.youtube.com/watch?v=dZVVGgM4yXY', 'https://www.youtube.com/watch?v=dZVVGgM4yXY', '2023-02-14 23:52:28', '172.71.16.175', 52),
('ytdl-org', 'https://github.com/ytdl-org/youtube-dl', 'GitHub - ytdl-org/youtube-dl: Command-line program to download videos from YouTube.com and other video sites', '2023-02-14 23:57:07', '172.71.16.175', 21),
('zod-', 'https://aondebaixo.blogspot.com/?m=1', 'Filmes e Séries Dublados em HD', '2022-05-17 08:53:05', '172.70.105.149', 67),
('zw2x', 'https://www.conrado.com.br/o-que-e-funil-de-vendas/', 'O que é um funil de vendas.', '2022-04-29 04:28:16', '172.71.6.195', 94);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `yourls_url`
--
ALTER TABLE `yourls_url`
  ADD PRIMARY KEY (`keyword`),
  ADD KEY `timestamp` (`timestamp`),
  ADD KEY `ip` (`ip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;