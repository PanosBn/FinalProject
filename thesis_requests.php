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
        //print_r($row);
       

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

    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Αιτήσεις Φοιτητών</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <table class="card u-full-width">
                        <thead>
                            <tr>
                                <th>Τίτλος Πτυχιακής</th>
                                <th>Κωδικός Φοιτητή</th>
                                <th>CV φοιτητή</th>
                                <th>Αποδοχή</th>
                            </tr>
                        </thead>
                        <tbody class = "styled-row">
                            <?php
                            foreach ( $row as $r){
                                
                                $student_id = $r['uid'];
                                //elegxos gia to an o xristis exei anartisei to CV tou 
                                try{
                                    $stmt=$conn->prepare('Select * from files where files.uid = :uid AND files.file_use like "cv" ');
                                    $stmt->bindparam(":uid",$student_id);
                                    $stmt->execute();
                                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $filename = $res['name'];
                                    print_r($res);
                                    echo "<br />";
                                }catch(PDOException $exc){
                                    echo 'Problem: ' . $exc->getMessage();
                                    echo $conn->errorCode();
                                    echo $conn->errorInfo();
                                }

                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $r['name'] . "</td>";
                                echo "<td>" . $student_id . "</td>";
                                echo "<td>" . "<a class=' button button-primary ' href=download.php?file=".$filename.">Download <a/> </td>";
                                echo "<td>" . "<a class=' button button-primary '>Αποδοχή <a/> </td>";
                                //echo "<td>" .$cv. "</td>";
                                echo "</tr>";
                                echo "</tbody>";
                            }
                            ?> 
                    </table>
                </section>
            </div>
        </div>
    </div>


<div class="blurred" </div>

<?php
  require('injecthtml/footer.php');
?>