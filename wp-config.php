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
define('DB_NAME', 'wp-sacred');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '33woodland');

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
define('AUTH_KEY',         ':Vs20j%*-bg*IB3<PIMtegW$r8#aB__|G-U?q3TTbdO|Tv5qbmm/DS4}j8>x)~T%');
define('SECURE_AUTH_KEY',  '9^WI9w`:X!y8cXm1n55,,txKl_pdO<*Wx7F2{as-NDPvp2)sckjGZ7$O0,2P_CBW');
define('LOGGED_IN_KEY',    'gv$s6$:C:C e}=p(>G(D=L-.pU~MK[?cE:2/zE^GZ1%<e0Mx00Dv+&`/IPH+Jte]');
define('NONCE_KEY',        'Hq&sOb}k6aAq-wI_U#s(uRDN^Lbt,{Mt)yeQOh@,T]J*g2SI:y8_Rpa<v+;M<E=s');
define('AUTH_SALT',        'gr-Ef/)yY]*I;|P.rxd!1({?]_[>Au|@>p5 rO~N<+i-_VEO_/>a59>fm-f3 Aeh');
define('SECURE_AUTH_SALT', '2h}rS63sq<7mgL/AJW;ymXsz?N]Y-VtY^Af5XC[ATe[!V^MwSP1D yep*645v$xm');
define('LOGGED_IN_SALT',   'yPW9V#tD;H>XE;2MtCB<Xoe)+zB QKJ7 !OnLa1aeF7opr-i62r`/~1W+GOdt*##');
define('NONCE_SALT',       '[!9cQHe8W<{&HwL~G(C^h;F+cg2D|wNfC+:xtasHOJ|b*I%X@g.Dh}J#lx9u#>[w');

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
