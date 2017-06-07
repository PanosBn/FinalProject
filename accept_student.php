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
                        $stmt = $conn->prepare('INSERT INTO accepted_thesis(name,faculty_id,stud_id) VALUES (:name,:faculty_id,:stud_id)');
                        $stmt->bindparam(":name",$titlos);
                        $stmt->bindparam(":faculty_id",$uid);
                        $stmt->bindparam(":stud_id",$student_id);
                        $stmt->execute();

                        //twra ginetai to delete tou thesis request tou foititi apo ti vasi dedomenwn
                        $stmt = $conn->prepare('DELETE FROM thesis_enquiry WHERE stud_id = :stud_id');
                        $stmt->bindparam(":stud_id", $student_id);
                        $stmt->execute();

                        //allazei tin katastasi tis ptuxiakis se "upo ektelesi" sti lista twn ptuxiakwn
                        $stmt = $conn->prepare('UPDATE thesis SET status = 3 WHERE thesis.name = :titlos');
                        $stmt->bindparam(":titlos",$titlos);
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