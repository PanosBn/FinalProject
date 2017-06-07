<?php
require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "professor"){
    require('navbar.php');

    try{

        $uid = $_SESSION['user_id'];
        $stmt=$conn->prepare('Select thesis_enquiry.name, user.uid from thesis_enquiry JOIN user on user.uid = thesis_enquiry.stud_id  and thesis_enquiry.faculty_id = :uid');
        $stmt->bindparam(":uid", $uid);
        
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);       

    }catch(PDOException $exc){
        echo 'Problem' . $exc->getMessage();
        echo $conn->errorCode();
        echo $conn->errorInfo();
    }



    }else{
        Header("Location: landingpage.php");
    }
}else{
    Header("Location: landingpage.php");
}

?>


<div class="blurred" </div>

<?php
  require('injecthtml/footer.php');
?>