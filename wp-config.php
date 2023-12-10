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
define( 'DB_NAME', 'malakoa' );

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
define( 'AUTH_KEY',         '#sox5Fyf##jX{C48u`|3z+)7$q.?Foa|/Lk8IK3RVwWLl7S^sZ3i~@0yZ`%`3Srg' );
define( 'SECURE_AUTH_KEY',  ',1)i QmjDV;Zfw9a4c{-zkJ.q(#eC5X3C90SG$m#W-81>Sd3P,uGDH/#2Z9*jxx8' );
define( 'LOGGED_IN_KEY',    'T)m-nS]dj1h!i<+Hc3]61w0S;GbZUgiC~1_-ZN9u18M*hVtU,+N6Nc]>Yum135vH' );
define( 'NONCE_KEY',        'DuZ@p^JG6|P*|fP*KXk[U0/L94p t0dMT[v6s|!r~hKg,x$}],w7_x3Z9}7BjDkn' );
define( 'AUTH_SALT',        'TROO $,98$9i]=Qmdw6D%c`vjiO?8DLLtdJdlrBu#q|A;}VyU]:v@DI,i=S)C)VQ' );
define( 'SECURE_AUTH_SALT', '&/X#; xN^_fZgZBKfX3mNs1`up+7h,fu^<U46;I/31u3.1bYE^=3uj7mjKiE@k4Z' );
define( 'LOGGED_IN_SALT',   'EwOORPT_B]PiwS<eS^2xDA46]E<VJ@A`tTa09oivqNj=S.&`;y5jY-Fp+cjybp0o' );
define( 'NONCE_SALT',       'y8ex1lE7 Y2DeY68Dau|tU?CKSF{sr`7rqB),z!xCi{=`TBn)s[4c&)9rexP*t D' );

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
