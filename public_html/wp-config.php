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
define('DB_NAME', 'con_np00128');

/** MySQL database username */
define('DB_USER', 'con_np00128');

/** MySQL database password */
define('DB_PASSWORD', 'xly&2d$A!T@L');

/** MySQL hostname */
define('DB_HOST', '192.168.0.4');

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
define('AUTH_KEY',         'fx.%~n6/h#(FW<l){@%v%:lZ+w?O*l`Acy@)}pSE@&hI9Lu}///:CBQ}*7;t|+Zi');
define('SECURE_AUTH_KEY',  '`+2!mcDG[[j6I<*].=&Bn_dX!Zw8zEr?8CD^{#)?->,Hi-IIRztPFJ:Lg&>X`Jx4');
define('LOGGED_IN_KEY',    '}xS}S]&pD5:WBEL.dxJ3CU,=YiS^Hc+-YU| ya]RL{0@)Mzoa(eXo<T$-vFm O{#');
define('NONCE_KEY',        'T+i~VH.vt%/P0cIK-teI(Fkce4RJ,VXo4|,I_x;>2Cp5^;W`XW3/f5n i=yLVb#&');
define('AUTH_SALT',        '=;f{`{*e6&T3H?/=#Br ,D[)@Y_T&l|$x#Pv45;.9%{sVkWm[PergnIE$lhIp-Of');
define('SECURE_AUTH_SALT', 'o-D.`Dr(g+~q_M*f2t;w4(wvrT0(ikSz<2O]pa6W9P(trx>YBzN5a7h}_z|ed ./');
define('LOGGED_IN_SALT',   '$#V:EKt}?.mMS-_o1#]S,FP{(+2*)=(I-LvC|X2vl:#^RCmfn#RgSyZ}a|iQZe+#');
define('NONCE_SALT',       '/9s/b[|?_KDpn2qk5g&du#)nMsZE=0bvV<s{^;VBRY52msO*INQ01^I>5yx,k];{');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'he_';

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
