<?php
$servername ="localhost";
$username ="panos1";
$password ="panos1";
$dbname = "icsd";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "insert into users values ('testrow')";
    $conn->exec($sql);
    echo "database success<br>";
}catch(PDOException $e){
    echo $sql. "<br>" . $e->getMessage();
}

$conn=null;

?>