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
define('DB_NAME', 'u330795979_lyjet');

/** MySQL database username */
define('DB_USER', 'u330795979_qaxeh');

/** MySQL database password */
define('DB_PASSWORD', 'SuSyMejaZy');

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
define('AUTH_KEY',         'yo21OTXSzW2qWxo7PdGgdt8oKYskyut9hS4Grwlg3g3E3kNjdl8s1SQ4KqbEfu4c');
define('SECURE_AUTH_KEY',  'SkmnLWgoCUmRUdBnJgNaobR7ZA6pnw7Tx6OWY0AX0VmnV0yuJ5DMs4xaCMFCu6I7');
define('LOGGED_IN_KEY',    '31aCffagH8L9ziXKTbF5t0hLWjnURllLArqKIRj7LmSjkQ4U7aUPFtlOTNud2hiK');
define('NONCE_KEY',        'ayIb5ss9wcUNRkTZRcuk9WXqIol8yyKmK0vAZRtDimksy4dUK7o7KaqzH2VAlgvL');
define('AUTH_SALT',        'TRvLTgwi2I3tpeHH7lBOo1P6Eon3fwUtpXKr1hekCA8ooplXvB5I2OO3nMp3DWcm');
define('SECURE_AUTH_SALT', 'CwdHmupbeasL0CyUiewyDiDach85crFddglNEoyfHZDDXhBEVlMwbDhV1akhEcYV');
define('LOGGED_IN_SALT',   'neWQhmzqwl78UnwKhc4kNnnSMEOUaUKveiDfsBZgg9ntSXoGM5qMqIfovCwja9bM');
define('NONCE_SALT',       '8glSzy86FnesyJZKIDFYkwciZejHqUc184eVEiMh0lT3k7kFeok8zPns6RQodsZA');

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
$table_prefix  = 'x8gw_';

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
