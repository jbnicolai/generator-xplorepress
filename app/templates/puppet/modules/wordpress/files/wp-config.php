<?php
/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'vagrant');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'vagrant');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'vagrant');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         'pb1*M$UB:j(kot$!tV0IWr_4ck*Fst}Mpy,+AJY@%-mrH-ZN3|v896n~z#0T:?{.');
define('SECURE_AUTH_KEY',  'wyd?[+4#_[3UFO>E`?R0waJE|(w?Qls+mo0z?R{9AyW%%5}6r+:^C(I%35nP-]-5');
define('LOGGED_IN_KEY',    'NTIuV9&ckiKzx&{pQKC7h+9r^{n-J-rS%ulBll5l.oVWM+&)L4Qt7Fd5M00 :o=-');
define('NONCE_KEY',        '9fdh+PR+O3n)MCP2zRYGfuk|/zP@CtU@nMw+0ix^|-7,Y+8:B7zDjPoA T+L[$zj');
define('AUTH_SALT',        '8 rF+xCqTPqMn.n,&Af@FZ`VMCoD&|r}#FV#RnNT-fZl]O_fefLVx6C 5/XnoA!f');
define('SECURE_AUTH_SALT', '8|ImR|o`u?_sz662q}1a(8aszXQCuP-A-VP(Kcq{33Ij3b&mi^O|+-<=SQ} uxVe');
define('LOGGED_IN_SALT',   '7uNv5EwAKGr*#j(JDMQS6kr`2-DY[jz@Q79[Gw%X.hmG05TTO+^2cqvyuXyW<bGe');
define('NONCE_SALT',       'c9A/9P%27|}@Y+(TqaPq$fTr!VDn}SG(fbI:).ys~SyU7Rg//Jyt,7Da_Rh+>wwY');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'wp_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', '');


/**
* Set custom paths
*
* These are required because wordpress is installed in a subdirectory.
*/
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . ':8080/wp');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . ':8080');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . ':8080/wp-content');
}


/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
