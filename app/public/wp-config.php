<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ',sOi5;IkA;>W#Fa%obwf}^}&o.sPiV1iRm}(~TfqeI]^;D7gv2Q16 LkG0Eo<`]P' );
define( 'SECURE_AUTH_KEY',   '3ok!R|80dY^%1NSNT~CKVB>fx$B49OxdO%=A#$8]h,[OEdTZ7x,mfkrB5&D5!_aY' );
define( 'LOGGED_IN_KEY',     'RmXW?b2za8_!,2%].pZ)wN -6<tvSRa.w-y^fv{tM:&}{1#&AJcImk]b)Z5O|G_x' );
define( 'NONCE_KEY',         '.[4ksuybtSh/J0[ny%;h_@:B#8We< QH:Q],L-h6Pw<1LcH})UD+}M!%f+GK@Y>N' );
define( 'AUTH_SALT',         'J<FV?G8$1}98eiAm2C/Z33,d?$ecl];t#)(}C0y|O7.wZs%7(W}6x<h)JIjbd:#f' );
define( 'SECURE_AUTH_SALT',  's6f,iSc,C!Oc&O25beM`VxNr _ JhcfGVt0#+.iv-Gji,/$o>[#N3~|mX{pT4?@A' );
define( 'LOGGED_IN_SALT',    'i=9xMy^8 %iw[DhIJ}>ZZx`a(b3N-saft,Pitrv)Rd+0NK*W5Q9bv:t{txp7wwm6' );
define( 'NONCE_SALT',        'ed0r#pFHWw`tDup|h&)!(zbIy4SO!=`UnCyEO-Uqw~VjAJ9 p+udo[)[ii+[G}D%' );
define( 'WP_CACHE_KEY_SALT', 'n=ebON$xNmoBm6)%y!o?n)i+{xZDK<S`#N(Qc%UmQ)(F.S8#:J+*Xy8wntZP;?cB' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
