<?php

ob_start();
session_start();

date_default_timezone_get('Europe/Athens');

define('DBHOST','localhost');
define('DBUSER','panos1');
define('DBPASS','panos1');
define('DBNAME','icsd');

define('DIR','192.168.2.5:8080');
define('SITEMAIL','panagiotisban@gmail.com');

try {

    
    $db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    //show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

?>

