<?php 
// CONFIG - These control the look and details on your site. Consult documentation for more details.

// GENERAL

// Site URL (no trailing slash)
define('siteURL', $YOURLS_SITE);

// Page title for your site
define('title', 'Gean Ramos'); 

// The short title of your site, used in the footer and in some sub pages
define('shortTitle', 'Gean Ramos');

// A description of your site, shown on the homepage.
define('description', 'geanramos.com e gean.me são encurtadores de URL. O acesso está disponível para convidados - entre em contato com contato@geanramos.com'); 

// The favicon for your site
define('favicon', '//gean.me/favicon.ico');

// Logo for your site, displayed on home page
define('logo', 'https://i.imgur.com/J6oXrQT.png');

// Enable reCAPTCHA V3
// It is highly recommended you use reCAPTCHA V3. It will stop spam. You can get a site and secret key from here: https://www.google.com/recaptcha/admin/create
define("enableRecaptcha", false);

// reCAPTCHA V3 Site Key
define("recaptchaV3SiteKey", '6Lf4owoaAAAAAB5FkH7R2hudX7fdle4IX-R4_D9y');

// reCAPTCHA V3 Secret Key
define("recaptchaV3SecretKey", '6Lf4owoaAAAAAMxP8fCACgJdwzSk-DxoD4KkZ1t-');

// Enables the custom URL field
// true or false
define('enableCustomURL', true);

// Optional
// Set a primary colour to be used. Default: #007bff
// Here are some other colours you could try:
// #f44336: red, #9c27b0: purple, #00bcd4: teal, #ff5722: orange
define('colour', '#007bff');

// Optional
// Set a background image to be used.
// default: unsplash.com random daily photo of the day
// More possibilities of photo embedding from unsplash could be found at: https://source.unsplash.com
 define('backgroundImage', 'https://source.unsplash.com/daily');

// FOOTER

// These are the links in the footer. Add a new link for each new link.
// The array follows a title link structure:
// "TITLE" => "LINK",
$footerLinks = [
    "Sobre"   =>  "https://gean.me/#sobre",
    "Contato" =>  "https://gean.me/#contato",
    "Privacidade"   =>  "https://gean.me/#termos",
    "Admin"   =>  "/admin/"
];

?>
