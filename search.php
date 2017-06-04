<?php

require_once('config.php');

 if (isset($POST['search'])){
     print_r($POST['search']);
 }else{
     echo 'Problemo';
 }

try{
            if (isset($_REQUEST['ajax_request'])){
            $stmt = $conn->prepare('SELECT * FROM thesis where title LIKE "%":ajax_request"%" ');
            $search_term = $_REQUEST['ajax_request'] . '%';
            $stmt->bindparam(":ajax_request",$search_term);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch()){
                    echo "<p>" . $row['name'] . "</p>";
                }
            }
            
            }else {
                echo "<p> Δεν βρέθηκε κάποια εργασία </p>";
            }
        }catch (PDOException $exc){
            echo 'Problemo' . $exc->getMessage();
            echo $conn->errorCode();
            echo $conn->errorInfo();

        }


?>