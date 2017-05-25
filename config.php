<?php

session_start();

date_default_timezone_get('Europe/Athens');

define('DBHOST','localhost');
define('DBUSER','panos1');
define('DBPASS','panos1');
define('DBNAME','icsd');

$conn = null;

try {

    
    $conn = new PDO('mysql:host=localhost;dbname=icsd', "panos1", "panos1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $exc) {
    //show error
    echo '<p class="bg-danger">'.$exc->getMessage().'</p>';
    echo $conn->errorCode();
    echo $conn->errorInfo();
    exit;
}


include('classes/user.php');
$user = new User($conn);

?>

