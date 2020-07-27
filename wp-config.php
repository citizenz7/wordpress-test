<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'wordpress' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'wordpress' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',.BQE=zkq+)W.c?ym|ddtczBGSn0SvYRr}X>vE]?DybS|XB:yVOnAv(e.?_.#>P>' );
define( 'SECURE_AUTH_KEY',  '=ZY#n3uelGp8q/[Td.Ky0nx$PYm-O2I*NlNV).(+BMWTR<05JbDL7W&2ws[eXO=i' );
define( 'LOGGED_IN_KEY',    'kA!uto4ki6|y+$aat@.UZ`cq#5`YSQpYsu^^2=< L7/-[:EcTag` Z:ER)V3O]m ' );
define( 'NONCE_KEY',        '*UnSO%/jwnDs4Q8>Sr7|{?gv*@|?Uc]Ox5~;4z xygga]EaZ+^N(bm]*l1T*f3~(' );
define( 'AUTH_SALT',        '41}C}B^mLS e ^@~F|TYV8YbErdu@pOaZ!*+T}xidY{jV;Ir#2-`N#P?kiC2{3%-' );
define( 'SECURE_AUTH_SALT', 'a@IS1&xYWK RdM``A#^><<y+AYiu]v5JJ&8G-^CZ}Mqvv:cBCU.zet?rWEToWSFw' );
define( 'LOGGED_IN_SALT',   'og0u5.tw?}4sD>z)Jv >??vj^`I>|y:hu9V*MM5N^Xp:b(_v!y=^EMx9M<_]Ve//' );
define( 'NONCE_SALT',       '^6MsKtiOWy?O<ayPuR:g29rNFYu!eF&vcD14`)#A%gJYn_}PVJ*N%kp;`]bzRx+h' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
