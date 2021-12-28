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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'trans' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'QF?^0.JCwuqar76UlWIR6dQ&}=+o0xhYVfYTBeHS5t]k&+3=;Xko)|n&]K=Akfko' );
define( 'SECURE_AUTH_KEY',  '79gNv{3y1/LB9W`HWq7`NbLGeL{-|{j>yTRjH#ge!mD1cnl/kF{/{9StfL,nLF;C' );
define( 'LOGGED_IN_KEY',    'jHc.j(:|rW(Mmc=}z)oLwE^Sx(S<!H=CHdX3~7>-3>~D?n}k xoC7H_<xKw^vzZJ' );
define( 'NONCE_KEY',        'RkoehPHFpS@Ox|:T4b|Q6wVSNV{uc5&`h=]3&@dD.W`+QBJ_pum;pk)FwpLzp:qM' );
define( 'AUTH_SALT',        '2@<Fw~Pd=?D{*Y_p&m2M3=|Dq(2S!?Ex)O9?4V,0:QEZKhb{Lwj7uL(x$IZ+JnZ,' );
define( 'SECURE_AUTH_SALT', '6mt+f|15*=k*At][X&2K)w-8D%sZuF&bsKEd~x|=@$ct<u)l]Qu;?HfZ|X&]bd^a' );
define( 'LOGGED_IN_SALT',   ',%ruH)/q`Uuo27q>cY5$Vs&L(:u})pN,6S0ezlm>[$4Qy8GdxIP_{1?QnDl>7fwR' );
define( 'NONCE_SALT',       '-_PeuQGm5<{raYd^$@-)1/F>{n]>O9.=Rat0t9-Bu;ySqe|j] |~}GHtrdxn:EA*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
