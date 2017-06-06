<?php

require_once('config.php');
require('injecthtml/header.php');
if ($user->session_status()){
    if ($_SESSION["unistatus"] == "student"){
    require('navbar_student.php');



    }else{
        $user->logout();
        header("Location: landingpage.php");
    }

}

?>


    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Τρέχουσες Αιτήσεις</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <table id="tableId" class="card u-full-width">
                        <thead>
                            <tr>
                                <th>Τίτλος Πτυχιακής</th>
                                <th>Κωδικός Πτυχιακής</th>
                                <th>Κωδικός Καθηγητή</th>
                            </tr>
                        </thead>
                        <tbody class="styled-row">
                        <?php
                             try{
                                 $uid = $_SESSION['user_id'];
                                 $stmt = $conn->prepare('SELECT * FROM thesis_enquiry where stud_id = :uid');
                                 $stmt->bindparam(":uid",$uid);
                                 $stmt->execute();

                                 $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                             }catch (PDOException $exc){
                                echo 'Problemo' . $exc->getMessage();
                                echo $conn->errorCode();
                                echo $conn->errorInfo();
                             }
                                        foreach ( $row as $r){
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>" . $r['name'] . "</td>";
                                            echo "<td>" . $r['thesis_id'] . "</td>";
                                            echo "<td>" . $r['faculty_id'] . "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                        ?>
                </section>

            </div>
        </div>
    </div>

    <div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>