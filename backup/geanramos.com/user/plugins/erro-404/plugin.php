<?php
/*
Plugin Name: Erro 404
Plugin URI: https://github.com/YOURLS/404-if-not-found/
Description: Send a 404 (instead of a 302) when short URL is not found
Version: 1.1
Author: Gean
Author URI: http://geanramos.com/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// 'keyword' provided ('abc' in 'http://sho.rt/abc') but not found
yourls_add_action('redirect_keyword_not_found', 'ozh_404_if_not_found');

// 'keyword+' provided but this isnt an existing stat page
yourls_add_action('infos_keyword_not_found', 'ozh_404_if_not_found');

// 'keyword' not provided: direct attempt at http://sho.rt/yourls-go.php or -infos.php
yourls_add_action('redirect_no_keyword', 'ozh_404_if_not_found');
yourls_add_action('infos_no_keyword', 'ozh_404_if_not_found');

// Display a default 404 not found page
/**
* function ozh_404_if_not_found() {
*    yourls_status_header(404);
*    $notfound = '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">'
*              . '<html><head>'
*              . '<title>404 Not Found</title>'
*              . '</head><body>'
*              . '<h1>Not Found</h1>'
*              . '<p>The requested URL was not found on this server.</p>'
*              . '</body></html>';
*    die($notfound);
*}

**/


//  if you want to display a custom 404 page instead, replace the above function with
//  the following :
  
  function ozh_404_if_not_found() {
      yourls_status_header(404);
      include_once('/srv/disk17/3254922/www/geanramos.com/404.html'); // full path to your error document
      die();
  }

