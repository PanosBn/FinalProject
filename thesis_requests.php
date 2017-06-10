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
// href=accept_student.php?titlos=".$titlos_ptuxiakis."&student_id=".$student_id.
?>

    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Αιτήσεις Φοιτητών</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <table id="tableId" class="card u-full-width">
                        <thead>
                            <tr>
                                <th>Τίτλος Πτυχιακής</th>
                                <th>Κωδικός Φοιτητή</th>
                                <th>CV φοιτητή</th>
                                <th>Αναλυτική Βαθμολογία</th>
                                <th>Αποδοχή</th>
                                <th>Απόρριψη</th>
                            </tr>
                        </thead>
                        <tbody class = "styled-row">
                            <?php
                            foreach ( $row as $r){
                                
                                $student_id = $r['uid'];
                                $titlos_ptuxiakis = $r['name'];
                                //elegxos gia to an o xristis exei anartisei to CV tou 
                                try{
                                    $stmt = $conn->prepare('Select filename from files where files.uid = :uid and file_use = "cv" ');
                                    $stmt->bindparam(":uid", $student_id);
                                    $stmt->execute();
                                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    //$filename_cv = $res[0]['name'];
                                    $filename_cv=$res[0]['filename'];
                                    // print_r($res);
                                    
                                    if ( $stmt->rowCount() > 0){
                                        $stmt = $conn->prepare('Select cv from thesis_enquiry where thesis_enquiry.stud_id = :uid  ' );
                                        $stmt->bindparam(":uid", $student_id);
                                        $stmt->execute();
                                        $res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        if ($stmt->rowCount() > 0){

                                            $cv_exists = true;
                                        }

                                    }else{
                                        $cv_exists = false;
                                    }


                                    
                                }catch(PDOException $exc){
                                    echo 'Problem: ' . $exc->getMessage();
                                    echo $conn->errorCode();
                                    echo $conn->errorInfo();
                                }

                                try{ //Elegxos gia tin analutiki vathmologia
                                    $stmt = $conn->prepare('Select filename from files where files.uid = :uid AND file_use = "score"');
                                    $stmt->bindparam(":uid", $student_id);
                                    $stmt->execute();
                                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $filename_score = $res[0]['filename'];
                                    //print_r($res);
                                    
                                    if ( $stmt->rowCount() > 0){
                                        $stmt = $conn->prepare('Select student_score from thesis_enquiry where thesis_enquiry.stud_id = :uid  ');
                                        $stmt->bindparam(":uid", $student_id);
                                        $stmt->execute();
                                        $res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        if ($stmt->rowCount() > 0){

                                            $score_exists = true;
                                        }

                                    }else{
                                        $score_exists = false;
                                    }


                                    
                                }catch(PDOException $exc){
                                    echo 'Problem: ' . $exc->getMessage();
                                    echo $conn->errorCode();
                                    echo $conn->errorInfo();
                                }
                                echo "<br />";
                                echo "<br />";
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $titlos_ptuxiakis . "</td>";
                                echo "<td>" . $student_id . "</td>";
                                if ($cv_exists == true){ //H epilogi gia download tou CV h tis vathmologias emfanizetai mono an exei anevei to arxeio
                                    echo "<td>" . "<a class=' button button-primary ' href=download.php?file=".$filename_cv.">Download <a/> </td>";
                                }else {
                                    echo "<td> &nbsp;</td>"; 
                                }
                                if ($score_exists == true){
                                    echo "<td>" . "<a class=' button button-primary ' href=download.php?file=".$filename_score.">Download <a/> </td>";
                                }else {
                                    echo "<td> &nbsp;</td>"; 
                                }
                                echo "<td>" . "<a class=' button button-primary' href=accept_student.php?student_id=".$student_id."&titlos=".urlencode($titlos_ptuxiakis).">Αποδοχή <a/> </td>";
                                 
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