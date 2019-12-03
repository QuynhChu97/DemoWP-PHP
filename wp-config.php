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
define( 'DB_NAME', 'wordpressdemo' );

/** MySQL database username */
define( 'DB_USER', 'wordpressdemo' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         'G$RJ|1<2_>RG`Nlk;}1g96MjN$BNJ`%,wp8);h>;iCEuP jlqKHB<.Ll,U`pw?dh' );
define( 'SECURE_AUTH_KEY',  'U?E1P<+! o.:t&3=:_Zwu#dv83CwlzQ4Y+.z;#=c6,+VJA1RAcoVTr2/]Ol;tN:)' );
define( 'LOGGED_IN_KEY',    'picL*3BI!/B6j0(KpZ 5uV>&)tL9@+#_lpYbZoI7$IsklsIQFEr[/a #o)@<9XQg' );
define( 'NONCE_KEY',        'jkbqMTZ<FtKL%P;kAtm/h,+FGqr0w5< mqWN+dba1X7+cYaYm40j_97vIa8$V5(L' );
define( 'AUTH_SALT',        '/:6!_FKeY,,()=O+GPya&YPg10/uhu9._7AOy&Fcj p9A84,4 BD|@fEy*JG/!Mg' );
define( 'SECURE_AUTH_SALT', '_Xx?n.nUeO>EUmZjo&tRv95= cnrT?Q[lRNRuW4-B*~FQ9Ij)BP}9A:xXU}$%7!;' );
define( 'LOGGED_IN_SALT',   'A{c^)qUATB-xN]?>CuA%wMHgO9bUPYZyar/^f@E{;sRW@WjAMFU#Yy&U6> ^U6_[' );
define( 'NONCE_SALT',       'b*f)h#U>SF~BJd86>kb6k.F BE<,Oq<[^mBdNJF .IiyaWHx}8{3Z64f4Xmwh1zg' );

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
