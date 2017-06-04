<?php

require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "student"){
    require('navbar_student.php');

    }else{
        Header("Location: thesispage.php");
    }

    if (isset($_POST['enquiry'])){

    }
}
?>

    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Τρέχουσες Διπλωματικές Εργασίες</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <form method="post" action="">
                        <input id ="search" name = "search_term" type="text" />
                        <input class = "button-primary" name = "search" type ="submit" value="Αναζήτηση"/>
                    </form>
                        <br />
                        <br />
                        <div id = "result" name = "result" placeholde = "Αποτέλεσμα..." ></div>

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
                                        if ( isset($_POST['search']))
                                        try{
                                            $stmt = $conn->prepare('SELECT * FROM thesis where name LIKE "%":search_term"%"');
                                            $search_term =$_POST['search_term'];
                                            $stmt->bindparam(":search_term",$search_term);
                                            $stmt->execute();

                                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            if (count($row) == 0){
                                                $stmt = $conn->prepare('SELECT * FROM thesis where perigrafi LIKE "%":search_term"%"');
                                                $search_term =$_POST['search_term'];
                                                $stmt->bindparam(":search_term",$search_term);
                                                $stmt->execute();

                                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                if (count($row) == 0) {
                                                $stmt = $conn->prepare('SELECT * FROM thesis where gnoseis LIKE "%":search_term"%"');
                                                $search_term =$_POST['search_term'];
                                                $stmt->bindparam(":search_term",$search_term);
                                                $stmt->execute();

                                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                }

                                                if (count($row) == 0) {
                                                $stmt = $conn->prepare('SELECT * FROM thesis where mathimata LIKE "%":search_term"%"');
                                                $search_term =$_POST['search_term'];
                                                $stmt->bindparam(":search_term",$search_term);
                                                $stmt->execute();

                                                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                
                                                }

                                            } 
                                            
                                
                                        } catch (PDOException $exc){
                                            echo 'Problemo' . $exc->getMessage();
                                            echo $conn->errorCode();
                                            echo $conn->errorInfo();

                                        }
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
                                            <td><input class="button-primary" name ="enquiry" type="submit" value="Αίτηση"></td>
                                            <?php
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                    ?>
                                    </form>
                            </table>
                </div>
                </section>
            </div>
        </div>
    </div>

<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>