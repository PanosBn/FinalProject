<?php

require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "student"){
    require('navbar_student.php');
        try{
            $stmt = $conn->prepare('SELECT * FROM thesis where status = 1');
            // $uid = $_SESSION['user_id'];
            $stmt->execute();

            $row = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            //$_SESSION['thesis-list'] = $row;
            //print_r($row);
            
 
        } catch (PDOException $exc){
            echo 'Problemo' . $exc->getMessage();
            echo $conn->errorCode();
            echo $conn->errorInfo();

        }
    }else{
        Header("Location: thesispage.php");
    }
}

?>


    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Τρέχουσες Διπλωματικές Εργασίες</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                <div class = "offset-by-one-third column">
                    <div class = "search-by-title">
                        <input type="text" autocomplete="off"/>
                            <div class = "result"></div>
                            <table class="card u-full-width">
                                <thead>
                                    <tr>
                                        <th>Ονομα</th>
                                        <th>Περιγραφή</th>
                                        <th>Κατάσταση</th>
                                        <th>Αίτηση</th>
                                    </tr>
                                </thead>
                                <tbody class = "styled-row">
                                    <form method="post" action="">
                                    <?php
                                    foreach ( $row as $r){
                                        if ( $r['status'] == 1){
                                            $status ='Χωρίς Ανάθεση';
                                        }
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>" . $r['name'] . "</td>";
                                        echo "<td>" . $r['perigrafi'] . "</td>";
                                        echo "<td>" .$status. "</td>";
                                        ?>
                                        <td><input class="button-primary" name ="submit" type="button" value="Αίτηση"></td>
                                        <?php
                                        echo "</tr>";
                                        echo "</tbody>";
                                    }
                                    ?>
                                    </form>
                            </table>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>

<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>