<?php

require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "student"){
    require('navbar_student.php');
        // try{
        //     if (isset($_REQUEST['ajax_request'])){
        //     $stmt = $conn->prepare('SELECT * FROM thesis where title LIKE "%":ajax_request"%" ');
        //     $search_term = $_REQUEST['ajax_request'] . '%';
        //     $stmt->bindparam(":ajax_request",$search_term);
        //     $stmt->execute();
        //     if($stmt->rowCount() > 0){
        //         while($row = $stmt->fetch()){
        //             echo "<p>" . $row['name'] . "</p>";
        //         }
        //     }
            
        //     }else {
        //         echo "<p> Δεν βρέθηκε κάποια εργασία </p>";
        //     }
        // }catch (PDOException $exc){
        //     echo 'Problemo' . $exc->getMessage();
        //     echo $conn->errorCode();
        //     echo $conn->errorInfo();

        // }
        // try{
        //     $stmt = $conn->prepare('SELECT * FROM thesis where status = 1');
        //     // $uid = $_SESSION['user_id'];
        //     $stmt->execute();

        //     $row = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        //     //$_SESSION['thesis-list'] = $row;
        //     //print_r($row);
            
 
        // } catch (PDOException $exc){
        //     echo 'Problemo' . $exc->getMessage();
        //     echo $conn->errorCode();
        //     echo $conn->errorInfo();

        // }
    }else{
        Header("Location: thesispage.php");
    }
}

?>
<script type="text/javascript">
$(document.ready(function(){
    $('.search-by-title input[type="text"]').on("keyup input", function(){
        var user_inp = $(this).val();
        var result = $(this).siblings(".result");
        if (user_inp.length){
            $.get("search.php", {ajax_request:
            user_inp}).DONE(function(data){
                result.html(data);
            });
        } else{
            result.empty();
        }
    });
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-by-title").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
}
</script>

    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Τρέχουσες Διπλωματικές Εργασίες</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <div class = "search-by-title">
                        <input type="text" autocomplete="off"/>
                            <div class = "result"></div>
                            <!--<table class="card u-full-width">
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
                            </table>-->
                </div>
                </section>
            </div>
        </div>
    </div>

<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>