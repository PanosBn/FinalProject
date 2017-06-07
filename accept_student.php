<?php
require_once('config.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "professor"){
            if (isset($_GET['student_id']) && isset($_GET['titlos'])){
                if (isset($_GET['titlos'])){

                    $student_id = $_GET['student_id'];
                    $titlos = $_GET['titlos'];
                    $uid = $_SESSION['user_id'];
                    // echo $student_id;
                    // echo $_GET['titlos'];

                    try{
                        $stmt = $conn->prepare('INSERT into accepted_thesis(name,faculty_id,stud_id) values (:name,:faculty_id,:stud_id)');
                        $stmt->bindparam(":name",$titlos);
                        $stmt->bindparam(":faculty_id",$uid);
                        $stmt->bindparam(":stud_id",$student_id);
                        $stmt->execute();

                        //twra ginetai to delete tou thesis request tou foititi apo ti vasi dedomenwn
                        $stmt = $conn->prepare('Delete from thesis_enquiry where stud_id = :stud_id');
                        $stmt->bindparam(":stud_id", $student_id);
                        $stmt->execute();


                    }catch (PDOException $exc){
                        echo 'Problemo: '. $exc->getMessage();
                        echo $conn->errorCode();
                        echo $conn->errorInfo();
                    }

                    Header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            }
    } else{
        Header("Location: landingpage.php");
    }
}else {
    Header("Location: landingpage.php");
}

?>