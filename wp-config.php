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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Jorge1995');

/** MySQL hostname */
define('DB_HOST', 'Localhost');

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
define('AUTH_KEY',         '%*op!gO5kEKy~YY$44@]fY&i/rY9!|)}O&=d4o^M:dLcu<K?F!Kt5(sp11iGl=ez');
define('SECURE_AUTH_KEY',  '1+~OI+2itz3jFGxM1UbKFy`=erd>_*}fb:l|<j)7v5-/+g_Futw=s%% _65iQWdi');
define('LOGGED_IN_KEY',    '6n|MvLE_>:H@$Y}fYwr,SvSn(,9K!NR5lV@h0v02mO_HPh<+}d#JOAkj8iw SM;o');
define('NONCE_KEY',        'a3VKZa_*S2$/.|z}$v6zsLAaFI(z|fB=+^N6))HK);Kk.$RFdm/,K,]|JOZa._}E');
define('AUTH_SALT',        'bQo9+}e,Ni8Z_TD#JI$X$KuG)o[qA)Xa$eY7}7u$ <X:`XQQ-(uG@x +tQ1&FO+k');
define('SECURE_AUTH_SALT', '9$wn^(D9W/jMc6hF8< 2F25V[-cA[sZ<`MWJDHRPl<5(h(V!:u-o5@!,*fLl5) 3');
define('LOGGED_IN_SALT',   ';A>4b4^p]]G2!hPq@%D^}qhr)QLcJ<CDhUY2JMELa6KFtNw~~)4fP3%**o,maDm`');
define('NONCE_SALT',       'wd@S/7v)S&QclB;uK%xZ2j.8+r9/L[{7cXt:m{B@mcZpfIsf+#?C(ESBr]9fl%jA');

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
