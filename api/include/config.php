<?php

date_default_timezone_set("America/Mexico_City");
setlocale(LC_TIME, 'es_ES');

// Configuracion de la base de datos
$conf_db        = "redefectivaeval";
$conf_ip_db     = "localhost";
$conf_usr_db    = "root";
$conf_psw_db    = "root";
$version        = "v 1.0";

define('DATABASE_NAME', $conf_db);
define('DATABASE_USER', $conf_usr_db);
define('DATABASE_PASS', $conf_psw_db);
define('DATABASE_HOST', $conf_ip_db);


include_once(realpath(dirname(__FILE__)).'/class.DBPDO.php');
?>
