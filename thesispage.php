<?php

require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    require('navbar.php');
        try{
            $stmt = $conn->prepare('SELECT * FROM thesis where thesis.faculty_id = :uid');
            $uid = $_SESSION['user_id'];
            $stmt->execute(array('uid'=>$uid));

            $row = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            //$_SESSION['thesis-list'] = $row;
            //print_r($row);
            
 
        } catch (PDOException $exc){
            echo 'Problemo' . $exc->getMessage();
            echo $conn->errorCode();
            echo $conn->errorInfo();

        }
}


?>

    <script>
        $(document).ready(function () {
            $("#flip").click(function () {
                $("#panel").slideToggle("slow");
            });
        });

    </script>

    <style>
        #panel,
        #flip {
            padding: 5px;
            text-align: center;
            background-color: #e5eecc;
            border: solid 1px #c3c3c3;
        }
        
        #panel {
            padding: 50px;
            display: none;
        }
    </style>

    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Τρέχουσες Διπλωματικές Εργασίες</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <table class="card u-full-width">
                        <thead>
                            <tr>
                                <th>Ονομα</th>
                                <th>Περιγραφή</th>
                                <th>Κατάσταση</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ( $row as $r){
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $r['name'] . "</td>";
                                echo "<td>" . $r['perigrafi'] . "</td>";
                                echo "<td>" . $r['status'] . "</td>";
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