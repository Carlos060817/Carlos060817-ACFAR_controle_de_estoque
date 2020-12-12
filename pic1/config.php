<?php
if(!isset($_SESSION)){
    session_start();
}

/** O nome do banco de dados*/
define('DB_NAME', 'acfar9');
/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');
/** nome do host do MySQL */
define('DB_HOST', 'localhost');
/** nome do host do MySQL */
define('DB_PORT', '3306');
/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
    define('BASEURL', '/pic1/');
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
    define('DBAPI', ABSPATH . 'inc/database.php');
/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');