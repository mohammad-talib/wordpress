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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Mohammed.123.' );

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
define( 'AUTH_KEY',         ']wZP$2+/!CBy_Q#F5vY$ySbbl@+:+nb/NB CYXvDiND6F4vG[4-bDq2mi7filqVl' );
define( 'SECURE_AUTH_KEY',  'G}pG2C?dCU%+eXrzIMqJ{vF11+EU_+o[{jjF~eznv9gVIas6=HC2|{)FO7~5DZhl' );
define( 'LOGGED_IN_KEY',    'Vc B/3/i>)5uu$~&4hqX2;=P3 ZXxv^J+V:@FF--oYK$LQMhz,^WkJLG^9C]SbOR' );
define( 'NONCE_KEY',        'O)Lacur%A(KVDl};sgFs~hUK*s>^n7oH^JNOA*U]NRIBw(A4r/MT;!8K*,&@Vk(v' );
define( 'AUTH_SALT',        ',>h`|dlBgoOoMd#Z#UlM^Ad!|~`/VQJX4.X!ZH_KQ|R~V*ti3M.$(iOCM%vR[^ds' );
define( 'SECURE_AUTH_SALT', 'BA!z7XHN}.NZru3<2y!SeWtl=Ap:9G*Sw_9CH>leG5]z>]:j+3%(d F&$g`$Br=8' );
define( 'LOGGED_IN_SALT',   'LS?_egzZ[G)U$eti$ 9=72|KH:@qP)1YLv)6w~b0B1!?$9m5zICAPcX9%D*QG{9:' );
define( 'NONCE_SALT',       'fvVNmS$AK8iZ7(mH+p}aLaF3CjW*Xa/KbLr7-QFwqK9:^9`EAZC!M`SUt{O<W*OH' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

define('FS_METHOD', 'direct');
