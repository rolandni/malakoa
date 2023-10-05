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
define( 'AUTH_KEY',         'YaH%^n`wGnn<zDKUklX^^~ bgQNz[]MPx!{i):iKF{?uX4f9wpw.W$H}RZW3HDyj' );
define( 'SECURE_AUTH_KEY',  '`Gqj0wVzosmVYBpO-Mb:>9@_Y=g%?(</h88BqmN~&d,:?c@;E<(&f,6TREIvCvua' );
define( 'LOGGED_IN_KEY',    'E? !c<E2o)7ONsUX(>d*9#q+Q{3nT;7=3;y9el+i<,G7bMg^pBGf-o=Iv(pk fUo' );
define( 'NONCE_KEY',        'U@wLgO}-V)X]RMcP<}l^fu@UR1zW!j2B AF5t^IE:B:Ig&u&yga06_rvh:Q.]NCz' );
define( 'AUTH_SALT',        'Jo>e2.@DM]r4[|_MCT9%!)S8UEreU*0ElIOK1_wA<r$dvf{d1}*lGOM7^q_.Qy,`' );
define( 'SECURE_AUTH_SALT', 'Bg!?df6URG#GewH9oP_r)!:(jPHZ2nYGRh9Y%M1#5F|[o,M(@n0HOS{j:Cqx[$dO' );
define( 'LOGGED_IN_SALT',   'b#?0sf_P$FcU+ra>YQ39J64-!IyNgDM>6@ 8DdfkEDf0d*q4]Yhx~<p60dJ9X7Z1' );
define( 'NONCE_SALT',       'ynw9zOeEmMR&D `IpGWJ{;4|$8pHp, $TC LCI]T0Xd ra9%:%QV~Z*lgb2Bk)Xk' );

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
