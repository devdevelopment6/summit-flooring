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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'summit_flooring' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9I<*)T,6j{{/f@NI%&Kbv wjS;O-6e3Kgy(,$if<2?r1Ja^uCs!=h$;KHA)3yQna' );
define( 'SECURE_AUTH_KEY',  'OQQ-<lP-SGsHy%9#UW({Z}nF%H!)k p_l(V%h-x^iOS|[[1G2c./A:V><+V2KzKt' );
define( 'LOGGED_IN_KEY',    '}*znYah^&DCDmWx!yZPQ~X6qY&#5X_`v0%V%QTy+=:vOu8r:`z)6|px-xo/nTsz&' );
define( 'NONCE_KEY',        'E4@o0H<~]~0fV2Z[?(=#vaI31$5~^lM}>b$vA#wuLQy3JXK,R^}Vw`o(pGOI!~:V' );
define( 'AUTH_SALT',        'ggl[?Z`c<6-U2VY4Be>yQ/`V;P|CS<53>7R,F8MB?4XLQ^O](JVu#=]e~A}L1(R,' );
define( 'SECURE_AUTH_SALT', '83lJi)5dv-)0/R-s~<v !:68lcdH{B7`7ada{2q|R<aby<NA7N,+GshR,Enb3r^(' );
define( 'LOGGED_IN_SALT',   'Tjr4wP0n(kT)Nzv0(X+}`b(#N[O8M>v(t|H4@ZqB7N![#EK[q2sdM3_#j#9;0Y9%' );
define( 'NONCE_SALT',       'VdOb3|.;.3]bo>dlRU6+J,>i7<p!]mI](gg$1LS^r_%5rSNuxI/ziQ_d>a6K#MUY' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
