<?php

require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "student"){
    require('navbar_student.php');

    }else{
        Header("Location: thesispage.php");
    }

    // if (isset($_GET["w1"]) && isset($_GET["w2"])) {

    //     $tmp_thesis_id = $_GET["w1"];
    //     $tmp_faculty_id = $_GET["w2"];
    //     echo $tmp_faculty_id;
    //     echo '<br />';
    //     echo $tmp_thesis_id;
    //     //$user->thesis_enquiry($tmp_thesis_id,$tmp_faculty_id);
    // }
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

                            <table id ="tableId" class="card u-full-width">
                                <thead>
                                    <tr>
                                        <th>Ονομα</th>
                                        <th>Περιγραφή</th>
                                        <th>Κατάσταση</th>
                                        <th>Κωδικός</th>
                                        <th>Κωδικός Καθηγητή</th>                                    
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

                                                    if (count($row) == 0) {
                                                    $stmt = $conn->prepare('SELECT * FROM thesis where mathimata LIKE "%":search_term"%"');
                                                    $search_term =$_POST['search_term'];
                                                    $stmt->bindparam(":search_term",$search_term);
                                                    $stmt->execute();

                                                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    
                                                    }                                                
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
                                            <td name = "thesis_id"> <?php echo $r['id'] ?> </td>
                                            <td name = "faculty_id"> <?php echo $r['faculty_id'] ?> </td>
                                            <td><input class="button-primary" name ="enquiry" type="submit" value="Αίτηση " onclick="addRowHandlers()"></td>
                                            <?php
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                    ?>
                                    <script language="javascript">
                                    function addRowHandlers() {
                                        var table = document.getElementById("tableId");
                                        var rows = table.getElementsByTagName("tr");
                                        for (i = 0; i < rows.length; i++) {
                                            var currentRow = table.rows[i];
                                            var createClickHandler = 
                                                function(row) 
                                                {
                                                    return function() { 
                                                                            var cell_1 = row.getElementsByTagName("td")[3];
                                                                            var cell_2 = row.getElementsByTagName("td")[4];
                                                                            var thesis_id = cell_1.innerHTML;
                                                                            var faculty_id = cell_2.innerHTML;
                                                                            alert("id_1:" + thesis_id);
                                                                            alert("id_2:" + faculty_id);
                                                                            window.location.href = "session_init.php?w1=" + thesis_id + "&w2=" + faculty_id;

                                                                    };
                                                };

                                            currentRow.onclick = createClickHandler(currentRow);
                                        }
                                    }
                                    </script>
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