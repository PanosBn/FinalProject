<?php

$unistatus = 'student';
$email = 'panagiotisban@gmail.com';

define('DBHOST','localhost');
define('DBUSER','panos1');
define('DBPASS','panos1');
define('DBNAME','icsd');

// *******Methodos me query
// try{
//     $conn = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $data = $conn->query('SELECT * FROM user WHERE unistatus = ' . $conn->quote($unistatus));

//     foreach ($data as $row){
//         print_r($row);
//     }
// } catch(PDOException $exc){
//     echo 'ERROR: ' . $exc->getMessage();
//     echo $conn->errorCode();
//     echo $conn->errorInfo();
// }

//*******Methodos me prepared statement

try{
    $conn = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('SELECT * FROM user WHERE unistatus = :unistatus');
    $stmt->execute(array('unistatus' => $unistatus));

    $result = $stmt->fetchAll();

    if (count($result)){
        foreach($result as $row){
            print_r($row);
        }
    }else{
        echo "Den uparxoun eggrafes :( sadtrombone.mp3";
    }

} catch (PDOException $exc){
    echo 'PROBLEMO: ' . $exc->getMessage();
    echo $conn->errorCode();
    echo $conn->errorInfo();
}

?>