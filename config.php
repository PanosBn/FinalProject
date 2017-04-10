<?php
ob_start();
session_start();

date_default_timezone_get('Europe/Athens');

define('DBHOST','localhost');
define('DBUSER','database username');
define('DBPASS','password');
define('DBNAME','database name');

define('DIR','192.168.2.5:80');
define('SITEMAIL','panagiotisban@gmail.com');

try{
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,DBUSER,DBPASS);
}catch(PDOException $ex){
    echo '<p class="bg-danger">'.$ex->getMessage().'</p>';
    exit;
}

include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);

?>