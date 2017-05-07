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
define('DB_NAME', 'cn-movie-store');

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
define('AUTH_KEY',         'q@nP&0WpIBdTHm/2Q3id=_)VYfmQB`?TLTh~9Mu-g{0j5kD^^((X1==q%.@Rg17*');
define('SECURE_AUTH_KEY',  'Kv:0=p62XzD=5BgDGRn:nk2T6710CY5PeMY}%p*b+er3$x[GzPa1BeOAnrB|<  O');
define('LOGGED_IN_KEY',    'CXUl=l;2u+e/sBvM8NJc9V( F_(E$a|0:YkYB~mRyn!WCxclv~H1`XK/C@,)^Hz@');
define('NONCE_KEY',        'ti8fs^{VshpmO_BI}}8xxqXf8((9^1yYlv5S$FMCUI]vJ*fb,YK7X4z;%LYEnkWO');
define('AUTH_SALT',        'bBJG8jl>3OUZCYke>Cl!oMOT?-.}>sGctXbj~K=`N~IZscZl;XaOVVlA}-<;OcSJ');
define('SECURE_AUTH_SALT', '7RiK0kw6&pX^S(),oC0Pk5<bO.~;8j0{|c/|@lTj0;AV&#]@bYYp%LBqjb@:=V}E');
define('LOGGED_IN_SALT',   '@3W]!#-Xw2{jyU{A9~F?C$ewM|kJ&Qv_=9]lt9wNrl6]XoO|9Fv-xjM|nTPHP==i');
define('NONCE_SALT',       'L;Q3xhnK(B&|%I+G,fop`YXUO9.1a6HMrBBA):Oj0)twofh%]wbymJnfl#kkT@?U');

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
