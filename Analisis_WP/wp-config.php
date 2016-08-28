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
define('DB_NAME', 'u330795979_abaga');

/** MySQL database username */
define('DB_USER', 'u330795979_emyda');

/** MySQL database password */
define('DB_PASSWORD', 'aBaQesuWaW');

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
define('AUTH_KEY',         'YEkBbiP0I2svyw6OBlhIENM2sdAZmEdY6uy7IYrR7ift9RCtkJYKCq9YJmIVeXUX');
define('SECURE_AUTH_KEY',  'xQUJ7DLazGBbGKqq22OrHlGUrOWp7TuHl4QSmKWJ7p3XC9zVPcbOzb1A9QSsxub7');
define('LOGGED_IN_KEY',    'j8z3ifSTTSGwjf3LsfeV0NgGsS0F1jnnofUiOMRsGTYr9NKVy7vITIj9gqlR3Lyr');
define('NONCE_KEY',        'jjBS116z9h2AABhh21kxokV06yqrxR2U6xEZUK99YXsUNAZruWWvyPgV4AJusaQU');
define('AUTH_SALT',        't6WYobttq4vkqnoywYdDjI0yfRMdoOqwI5KGWT6PDi0nt0SR1f1SPyWlbH0a8IvQ');
define('SECURE_AUTH_SALT', 'xAqzlYT0iQp4ASnszSbUrOS9FTrA8RkCrjT56V7i1hvQF14kU3bEkH4VwBsSDNXk');
define('LOGGED_IN_SALT',   '9jj8EKJPO7kIuQftXVBeiU8aeLFu7CVSdG2RLjzpdiYC5gRPXPSrNhaaLUKSwo69');
define('NONCE_SALT',       'KLAFMAzwIAuYA4ITNor1z9v7Yk4ruWRofsA2Wjgs8eIKRVLn46J3yVI0QPC8amyG');

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
$table_prefix  = 'blh2_';

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
