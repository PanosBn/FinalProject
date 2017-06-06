<?php
require_once('config.php');

if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {

    $filename = $_GET['file'];
    
    } 

else {
    $filename = NULL;
    }

?>