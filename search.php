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
            $stmt = $conn->prepare('CREATE TABLE thesis (
                                            id Int PRIMARY KEY AUTO_INCREMENT,
                                            name VARCHAR(30),
                                            stoxos text,
                                            perigrafi text,
                                            mathimata text,
                                            gnoseis text,
                                            submited date,
                                            started date,
                                            finalized date,
                                            faculty_id Int,
                                            stud_1 int,
                                            stud_2 int,
                                            stud_3 int,
                                            foreign key (faculty_id) references user(uid) on delete cascade on update cascade,
                                            foreign key (stud_1) references user(uid) on delete cascade on update cascade,
                                            foreign key (stud_2) references user(uid) on delete cascade on update cascade,
                                            foreign key (stud_3) references user(uid) on delete cascade on update cascade)');
            $stmt->execute();
        }
        catch (PDOException $exc){
                echo 'Problemo: ' . $exc->getMessage();
                echo $conn->errorCode();
                echo $conn->errorInfo();
        }

echo json_encode($res);

?>