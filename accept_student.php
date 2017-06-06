<?php
require_once('config.php');
if (isset($_GET['student_id'])){
    $student_id = $_GET['student_id'];

    echo $student_id;

}


?>