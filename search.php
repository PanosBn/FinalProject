<?php

$conn = null;

try {

    
    $conn = new PDO('mysql:host=localhost;dbname=icsd', "panos1", "panos1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $exc) {
    //show error
    echo '<p class="bg-danger">'.$exc->getMessage().'</p>';
    echo $conn->errorCode();
    echo $conn->errorInfo();
    exit;
}

        try{
            $stmt = $conn->prepare('CREATE TABLE messages (
                                            id Int PRIMARY KEY AUTO_INCREMENT,
                                            uid int NOT NULL,
                                            sent_by int NOT NULL,
                                            message_text text ,
                                            message_date datetime,
                                            foreign key (uid) references user(uid) on delete cascade on update cascade,
                                            foreign key(sent_by) references user(uid)on delete cascade on update cascade)');
            $stmt->execute();
        }
        catch (PDOException $exc){
                echo 'Problemo: ' . $exc->getMessage();
                echo $conn->errorCode();
                echo $conn->errorInfo();
        }

echo json_encode($res);

?>