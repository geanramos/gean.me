<?php
/*
Plugin Name: Permitir sublinhado uma URLs curta
Plugin URI: https://geanramos.github.io/
Description: Permitir sublinhar uma URLs curta (like <tt>http://sho.rt/hello_world</tt>)
Version: 1.0
Author: @geanramos
Author URI: https://twitter.com/geanramos/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_filter( 'get_shorturl_charset', 'ozh_hyphen_in_charset' );
function ozh_underline_in_charset( $in ) {
	return $in.'-';
}


