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
define('DB_NAME', 'travelWorld');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'x SQ]R)<.`n1]Oe^@( 1;hX48X^gkN^uQ!=-*Rgr<2@&mYWh#{Tdv/j@:+LV=6er');
define('SECURE_AUTH_KEY',  'B34b> jiBoy<LqLH^_RWHeY^l94wik@3+|o85@QG2]]x,Itaa1rQJC93/0:Yd&`5');
define('LOGGED_IN_KEY',    '-XC*H&.5H6R{*6o_ERDa[I,bM3}2M`_O2SmfX9.NZr3:=O}]t5hjCaU_P:8Wh;YU');
define('NONCE_KEY',        '/G$FRm&-vbxQ.J hGgR&Rev^3>C/?!mith9q56]#3>B;H(/=vwxCcp;~J1~2*Tg ');
define('AUTH_SALT',        'PSNKXi6~IOp;;KCGs=,2Fju5{y%QWI0D3}ecGkD>S(V$u>zV,^]k(aCo{qJ`|[Fj');
define('SECURE_AUTH_SALT', '_ -dY_}~J}/>8Vy*U-fBRVD](.M77NEp0qW{88xNsPESe|&v)C)?Ws`-wqk)?LpA');
define('LOGGED_IN_SALT',   'y?|A&SkChT+gQlAN{vkF=.=e31S.^shW}>? $]*=p|2hlIF+:$`hm5o/<+4/DLBw');
define('NONCE_SALT',       'c&4I_i:?c9dXlz+1G(&KT0?^nw:^Ind>MYJBN~j&Mg~?Av[SpeCqD<%^07.9(^`t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
