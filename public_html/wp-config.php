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
// define('DB_NAME', 'patjawat_site');
define('DB_NAME', 'patjawat_site');

/** MySQL database username */
// define('DB_USER', 'patjawat_site');
define('DB_USER', 'root');

/** MySQL database password */
// define('DB_PASSWORD', 'l;ylfu8iy[');
define('DB_PASSWORD', 'docker');

/** MySQL hostname */
define('DB_HOST', 'db:3306'); //สำหรับ docker
// define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'e4ceecf05d10c8a32320e9cef6a43e32cc0552b8');
define('SECURE_AUTH_KEY',  'aee61f11eacbf036fea884a0aef47237164379bb');
define('LOGGED_IN_KEY',    'd478546f27983d1e8b0ab325c4bb8d12a043348c');
define('NONCE_KEY',        'bfaaf5b927059416c4fead6387255f16e66f8883');
define('AUTH_SALT',        'c577914ce90d3cbc58eb59fa406ec30d96e8b397');
define('SECURE_AUTH_SALT', 'b6e9833e7fbafdd3f552580b12a6d26f6620a8a9');
define('LOGGED_IN_SALT',   'ae0265e042e8172d5a275fcfe7d620815279dd34');
define('NONCE_SALT',       'd6cc1c4465256ad196f1676a0214dd9cb0584553');

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

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
