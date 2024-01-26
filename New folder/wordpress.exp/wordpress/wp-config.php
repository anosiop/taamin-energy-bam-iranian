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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress.exp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'gAqL23+PZJT*%nOR0 b)dq=)?Qa,dMu59#N_jJ6+{5`g>zYIEK`UPmIK4t]-u^<b' );
define( 'SECURE_AUTH_KEY',  'B{iaDXs_KRdN^_F}QR!)=~(0j6:zZ3nK(eu8@1IK(q*T0UjlYpL&oQ*I/nbm@;ZX' );
define( 'LOGGED_IN_KEY',    'DY9Zat_KL}h4*c/ %>[AJd_tzMVN$$I/u9@am~Rir/ytg*F03D{sOH4bOU?5or)3' );
define( 'NONCE_KEY',        'LwX[>R}v:xl%(4RK OlSfu_Ps!R_>*1S6&E>wcu]Wy6,=HZSC!mql>shE~*wSG9M' );
define( 'AUTH_SALT',        'V}0KYxN2;Iy;`7gyiTEln46QZ9>^iYaU,wrx).6f%c^1r.>K-7?K#cOyHt(4@[L[' );
define( 'SECURE_AUTH_SALT', '^1Jo*yr@T<qbk/Qw`+h5apC[RNNSCHW~DV75pQ]?g}PNC.HiNsYFBl{:x*S@&~<f' );
define( 'LOGGED_IN_SALT',   'T;>1)kj1?<+tjV#_z21-xB{$K9f)*YB}5Ydkk/h.9s;q>W{3/FFXlYWErsppgNEL' );
define( 'NONCE_SALT',       'YoIO<V$OzH=esf(C2=+#@6l]BS7F!20!KBVVW0EPfqtoy__aL9DT!=wX/V vSIz.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'exp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
