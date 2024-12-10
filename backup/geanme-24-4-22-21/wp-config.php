<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'id11764954_wp_aed681ed78ae17290952de8d0e506580' );

/** MySQL database username */
define( 'DB_USER', 'id11764954_wp_aed681ed78ae17290952de8d0e506580' );

/** MySQL database password */
define( 'DB_PASSWORD', 'eeccfc50514c182628916eeeb82a55a81dafc23a' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'gs=82<Ux7YscVOC&}?lKO4610wWn%zsY*NtaK?AOR_RheF<2hpS(VUz+d+<qsxh|' );
define( 'SECURE_AUTH_KEY',   'Q1l5;7kM`72 QjSkT`iPK*:hk.Oq,oF)Ro;5+4_tN2@v<V*bhM#4nhrx)O1^?pFc' );
define( 'LOGGED_IN_KEY',     '~Gwfi@:FU!G~1%@f!E+m}dcpHwmhqKfQD[{J!bJpBM(@q |Pe~9*(T,R.N-0eW>&' );
define( 'NONCE_KEY',         'HbzXfM&Ks4E$?|5<5D`{fNCA=iFW=l_4V}1WK.yK}YWb{xYU5_W7f_ i[laLV-X ' );
define( 'AUTH_SALT',         'JAFSMt#-W0Z)V;p%cEpr_v(.D4^Vm2kF Off)~>MRiIRB93@bABT>Q5`sd6bL=`i' );
define( 'SECURE_AUTH_SALT',  'tS%navg)Fw;5il}rX~k!TW~gs>N`VFQC(;(ec~2/13L4]j[ +w=FH$J@ZT.A[~Dr' );
define( 'LOGGED_IN_SALT',    '_1*_Ny?oxLEy$@;3k[A_Jp`{- p]oaf(BQr,tUPLzp#! WSOj{Zu5_}`td7IB(sH' );
define( 'NONCE_SALT',        '!H/&fs}]DMz.=g`d^[E?!E?N^&c;qfOUt*eSVJ}CTXHAA7/:/Du,-a<4jaWE?yeD' );
define( 'WP_CACHE_KEY_SALT', '.Y| S1RXC=?3=9 ;!Hp-pT$mky$JCaBVn$wLT:O%3Zzn#MdApJP25D$alX.h,j-E' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
