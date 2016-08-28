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
define('DB_NAME', 'u330795979_webud');

/** MySQL database username */
define('DB_USER', 'u330795979_navad');

/** MySQL database password */
define('DB_PASSWORD', 'QyRyLubyLe');

/** MySQL hostname */
define('DB_HOST', 'mysql');

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
define('AUTH_KEY',         'b0BWKj3nxVsh0QhtLjVrkVxd25C3wbvKW7UeRp1cYf0BiiHMxL9T1UWV5rfEg7A6');
define('SECURE_AUTH_KEY',  'RtUVPhVB4hjg12XxiExvOSjlkFJJv9kzzmQeTNzzMMNBlWYQzpkXYCZdj56soMHH');
define('LOGGED_IN_KEY',    'uJVdXd1cE9k3QzdlNgInsaDP2xDuk8wsCFDDZL1hRR8JUVcdIhdZommjzbcTpkRK');
define('NONCE_KEY',        '5Ccu8r60S28JaQfFw3p6GmYFMW2YkUnsA4gxYbDBkQehiWguPiXNWtSrxTvcCtU0');
define('AUTH_SALT',        'vckkg8nrAEkB5mYm7jV0Ba7H1aP2btx4kyoAcbkP9x9vXnyvRe02eSinhEqiCdEi');
define('SECURE_AUTH_SALT', '9o11wmARCec2Y3JMWX5sMUX9MAIXBoxK2AWFXTDW1cglR05KBbzlFwDUt5SgBE4x');
define('LOGGED_IN_SALT',   'onG3W3vrDtNEPwLhvomXV34syvr8VNEJj2OyUAvCZO54mpItRrmo532LczPzlAOC');
define('NONCE_SALT',       'mvXka8BfXwk7nRnXRUERVacXwZvJPCbx5ln3pH94Qzx7X7I6T1fy2O7Mf2s5OsNq');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
