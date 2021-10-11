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


// Enable WP_DEBUG mode
//define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'loanjar_uping' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'fNf..Oi~:vSrwFmMui`C%b,6h+5&]{AMtdmWYK(mIIgrX6bh-uI&=paV!L;g@N,r' );
define( 'SECURE_AUTH_KEY',   'w=p1/.F^3]>s3q*>xrpI:]TJ7<Eigo-*Nmp]!Xwpztv{.X)v&vW> *-FZi=ZvDj2' );
define( 'LOGGED_IN_KEY',     'Q,B!i9=$d^qV__)~-Aoh0pV@AlAU_Big5&a_U-wE<{(!L+ed;q Kg;hcqD3Z6qNt' );
define( 'NONCE_KEY',         'h1gKO*cdW!hcQh*G3{vA1)!mu_1|%%gwrwrM~?p&:9Ze:-3Y^/R], :Z,_Pj  sT' );
define( 'AUTH_SALT',         'B`xD k{=M_SNw)4@++qqs(p#D]7S^/w3>7k)EQu,4vbHrH6O*A^Iiz~%|*|R[.w0' );
define( 'SECURE_AUTH_SALT',  '9Ol3Wsb+}aOIquHe4M~w&jckWt,*d/N+Tct!*5cUGKyO9i6&Gl@*(|`,rl)!`&0#' );
define( 'LOGGED_IN_SALT',    'O?u|oACrmS)NaOKO0q+#z6iox`]JSI*a4)ey&5Y{hWd?*<BPCNwD{*18Hge7r<h)' );
define( 'NONCE_SALT',        'lXw(9^BUqJRLKG;8e5@M,:;BE2c^+Qy W9POYhXFvM_4*}ybTe/e#L6Ek:wCk/l5' );
define( 'WP_CACHE_KEY_SALT', 'jv8RR[p<g$f`9nQkHp5d/m[HK?uTp*dSV%Autjy#h9TbSg8$C8rsAyiyr0c~kvyy' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
