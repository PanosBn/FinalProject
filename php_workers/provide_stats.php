<?php
require_once('../config.php');

    try{
        $stmt=$conn->prepare('SELECT * FROM thesis');
        
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);

    }catch(PDOException $exc){
        echo 'Problem' . $exc->getMessage();
        echo $conn->errorCode();
        echo $conn->errorInfo();
    }

?>