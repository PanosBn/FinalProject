<?php
require_once('config.php');

if (isset($_GET['thesis_id'])){
    $thesis_id = $_GET['thesis_id'];

    if (isset($_GET['faculty_id'])){
        $faculty_id = $_GET['faculty_id'];
    }
    echo $_GET['thesis_id'];
    echo " <br />";
    echo $_GET['faculty_id'];
    echo " <br />";
    echo "Success!";
    Header("Location: diathesimes.php" );

    $user->thesis_enquiry($thesis_id,$faculty_id);
    try{

    }catch(PDOException $exc){
        echo $exc->getMessage();
        echo $conn->errorCode();
        echo $conn->errorInfo();
    }
}

?>