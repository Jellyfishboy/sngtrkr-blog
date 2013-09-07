<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
if ( file_exists( dirname( __FILE__ ) . '/wp-config-production.php' ) ) {
    require( 'wp-config-production.php' );
}else {
    // ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'wordpress');

    /** MySQL database username */
    define('DB_USER', 'root');

    /** MySQL database password */
    define('DB_PASSWORD', 'root');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');

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
    define('AUTH_KEY',         '&~aR]jw~U/tRwXJiN94r&Eo/cZ|5RMFr&/jU<&D[<yg|;=e6o{.o2+i@qB-#{xa1');
    define('SECURE_AUTH_KEY',  '_D)V2ZbfY,u8O1RbT8*f6&L55:w3qRzwqwg-)-9<S@@)7R#>dpXD]XF.qnZqrE_C');
    define('LOGGED_IN_KEY',    'N&kA:s[b{$*XE^n~+--zX>)~OB( b-%b73.4^s+Dh{<&bf*_V+!sQ-#% -bKih6Y');
    define('NONCE_KEY',        'a>tkmYh=mJPMUZ-X:sI@o6-%yM-kDs9Y0k4|,2-/4fI.+;ZI:5hh1A!yM0Q4QKr9');
    define('AUTH_SALT',        'vtkjx/E#IAezIt,E!NCKbE<SVXJh%xB0m~yNFn)tqsjCTPIf0f+Z7@1F =tlS?2=');
    define('SECURE_AUTH_SALT', '9 [oKBR ckam+Xmn~$~)@0N+u0VZ*E]|m&Gw8`~26i6*qI&fXcNREMF |@fyh.xA');
    define('LOGGED_IN_SALT',   'hLGh[ }/O!wrx<(h/Q3>NX1f+a5^WP_W-T=h/yoxS)!kqvRfawp|)1M=ogQ5QnJ/');
    define('NONCE_SALT',       '}JqP-!-CMq8|a M5coPIWDDjdas -nmx5dE-y+Q[+|u?M-2rgH=K(s]mR74`<n.*');

    /**#@-*/

    /**
     * WordPress Database Table prefix.
     *
     * You can have multiple installations in one database if you give each a unique
     * prefix. Only numbers, letters, and underscores please!
     */
    $table_prefix  = 'wp_sngtrkr';

    /**
     * WordPress Localized Language, defaults to English.
     *
     * Change this to localize WordPress. A corresponding MO file for the chosen
     * language must be installed to wp-content/languages. For example, install
     * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
     * language support.
     */
    define('WPLANG', '');

    /**
     * For developers: WordPress debugging mode.
     *
     * Change this to true to enable the display of notices during development.
     * It is strongly recommended that plugin and theme developers use WP_DEBUG
     * in their development environments.
     */
    define('WP_DEBUG', false);

    /* That's all, stop editing! Happy blogging. */

    /** Absolute path to the WordPress directory. */
    if ( !defined('ABSPATH') )
    	define('ABSPATH', dirname(__FILE__) . '/');

    /** Sets up WordPress vars and included files. */
    require_once(ABSPATH . 'wp-settings.php');

    /* define correct location of the site */
    define('WP_HOME','http://localhost:8888');
    define('WP_SITEURL','http://localhost:8888');
}