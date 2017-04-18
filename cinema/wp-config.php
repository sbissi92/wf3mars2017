<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'R%i&?VagTM-1xH$<fMgmskj~UMA_x/)F$k7lh+_AEiKIGb7Iu2LHb^K]i`NyGpw3');
define('SECURE_AUTH_KEY',  'ST`(^5p*u2r&A]!1byEQ7pY?ZIR>59TrWS, ICF~#UEnszG_*;MA(bWKxzs%E:OP');
define('LOGGED_IN_KEY',    '!eCj}7{wy;CU:Fvu<lOTW(HtRre,{? sd(,RkKcAuJf/Fh*Z<byH)Wvxw>b$cu K');
define('NONCE_KEY',        '^tW30|E/U!N`>Wf?r*{(hj71TR$`M!xAaQg!&i[$KjW!}OKq*$42MF~-Ua%t|X)j');
define('AUTH_SALT',        'k}WYmK6GHkZ}wU3paSl;:j#0NoQns_4J9Rrz@T*.gd$//|5y!3F)UysqvRLz_Z k');
define('SECURE_AUTH_SALT', '@y-:%U?gsvu6uIh1+V:6ox/D9{#r#!43JigqmrcSyEpqqpg9F^)=S87i2??7q;K|');
define('LOGGED_IN_SALT',   'FS^mM;L*0|N/*#(;9Tm18fp69.{(8rL#N ut`dPoe[$9^ IFxj},Fx<itL|i8[_W');
define('NONCE_SALT',       'O9)E7,#|YK,WO%;Vh82+Q!koKJ,AUB?xm_ }PB4;k-I6U]KSYh[=1^99MgmBY!HZ');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

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
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');