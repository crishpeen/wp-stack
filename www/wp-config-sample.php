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
define('DB_NAME', 'wp-stack');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'pass');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'N)c;u`!N/#!CCA~vFskfHv4;3GA;P-LX;.SeA(%?>fVUh9T=ie+-+vcs|HvTf+@|');
define('SECURE_AUTH_KEY',  'T`<X>:uYo=$x;_za:e8nFXB[V|SuQxk23DdU(p$?1%_&yUX%wuvBx+:v[<#j=ou#');
define('LOGGED_IN_KEY',    '[kLHa%u>:;=DkD^B ]WLqM{>G@)T[D>}m96nQ]5ho4UyK=Fqx0cARNXW+vJ<D6))');
define('NONCE_KEY',        'i,P gaK~^0mV`9rm=KpHy?ketvaBiZ^bj:.6.#6C:pUluc*zjNHH[n|Z/rGNH#)$');
define('AUTH_SALT',        '<P&/1nsKcp,r9lu?A$}q8yosHej[qcn^l:[Ao`Rts]b?E6F9%LA2g^W;BNivmh4w');
define('SECURE_AUTH_SALT', 'dG}x5~9!R|N6mDSJ6>o)s5Cc# g?k5e& ,L=iD[1NLT-WTf>_Kc!)=W14sev$B[~');
define('LOGGED_IN_SALT',   'TCSmJm(~Kc-d)3<,#!h1wuARGN7ou%.EUUL.D+T+rrVtmk<~Mi]Cw4QpRA9nDJ6l');
define('NONCE_SALT',       'XO`e5j ]fk%Ugeqr{@oD)}|.PcR~e@dX?0VwxmvD`ak~Q@aImB_YdTqf&_8=<BLF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

define('WP_HOME', 'http://wp-stack.localhost');
define('WP_SITEURL', 'http://wp-stack.localhost');
define('WP_CONTENT_URL', 'http://wp-stack.localhost/wp-content');
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
