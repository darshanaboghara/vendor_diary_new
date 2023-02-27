<?php
define( 'WP_CACHE', true );
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u840867800_6Tyva' );

/** MySQL database username */
define( 'DB_USER', 'u840867800_081e8' );

/** MySQL database password */
define( 'DB_PASSWORD', 'BFrmiNuprm' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',          'Hwk#AZ[{?1UZ5>)bEhm.@u_#Gpyqc<Bd{9O.55liFG4w2~u;+{WM@y/*oB;gg7<d' );
define( 'SECURE_AUTH_KEY',   'cIMm>8$5E%} =wY4{v$ Y$KUS,yNW>hvUza%UwbC/@evZQg*AJ<)sA%.M?)`g1M;' );
define( 'LOGGED_IN_KEY',     'XFs eBPB|]s1FT9-hH>u:k&w$,mDL79GJ3[#BP[,.@w5^VC@$R;TqD]HN$FO*n1{' );
define( 'NONCE_KEY',         'ww)?FxN!d!}y{C_U_<$<R#YE~xh]MhYM[S=La=~/tBd~+WAy>}=8>m](-hK#UfO#' );
define( 'AUTH_SALT',         '/A#jR]wFfee$Z@0xIe!Z.2GifPn8;%ANye^i%oVu!{(zkj;5s}`V5tmHxS7#xMx2' );
define( 'SECURE_AUTH_SALT',  'tY{^*:` )Pj]sJU;VCZu<rk,#UWO>4Pls0-GJRgo3lHkttvNv@j1YM?fAR$~Q<>i' );
define( 'LOGGED_IN_SALT',    '70*zg7e7XJhI&W~r@OBO1X5qmWoO.,YV:VEf%Qv9).`;@Gz=K-+pHvvlo@ma1f0%' );
define( 'NONCE_SALT',        'BH[[2#v6a{I70aL7!K2[g ;eP6o4@6p^V&x%G9.q:K d}1Q=y$nAB&UYhmlv$Bv^' );
define( 'WP_CACHE_KEY_SALT', 'yBk,Weyq|-/yy&7B;ar~%jk ?DX,<FCEI*G56zs/8xRg,]kU=_&{D5<.?G&Y@3eI' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define( 'WP_AUTO_UPDATE_CORE', 'minor' );
define( 'FS_METHOD', 'direct' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
