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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'marc112009');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'C}_+U`?$qfWt-] @1Rd0F18id_>^7ZT^lG8SsngF8SGCl5C!KPdS5*A3n)^0Ljy-');
define('SECURE_AUTH_KEY',  ';J:Ii]Tnplfg(_LnB@_v%Wy:|[+#xZn`]jpkEY22v>BhNY)6kgB1[ZVA9IrwJ4iE');
define('LOGGED_IN_KEY',    'x=~W<`9FK=PeRkEx2!5-FJD@I%OC#,[CUzfxQ }R`D#+Y}npe*qfQeRC=m|=~0|)');
define('NONCE_KEY',        'LMCD}xb~9p$kmF]vA7nq`VU>l]@AHD#h#E:br$)tLn4sZ=k*<up0RGjTaW3/OO8]');
define('AUTH_SALT',        'L@6B(=FIa-~TN7JZRP)x+CcyjKqc(H,+ ,(k^jKVvos42]>uze%rM(BRJWKlOQc%');
define('SECURE_AUTH_SALT', '[1n~~qU|-vxZ{Wuks+v%[H4>`ncX![gi/P([~ urB$]=W2ZNg,sI6<z0dRDXbw;9');
define('LOGGED_IN_SALT',   ';=A4K=9K3sTmU#1i;TA-/TfHD?=zNa$Y`,m3Oj)LooF{PihKg13c=/x@%r7Z80j&');
define('NONCE_SALT',       'D@-DY}>,CrPt3>Vj}t DyB:wjj=~k16hAYOn2:jhsoLa=-}7RLbbMtk 4tB@Gz3N');

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
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
