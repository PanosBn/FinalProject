<?php

class User{

    private $conn;

    function __construct($db){
        $this->conn = $db;
    }

    public function login($given_email, $given_password){
        try{
            $stmt = $this->conn->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
            $stmt->execute(array('email' => $given_email, 'password' => $given_password));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($stmt->rowCount() > 0){
                    $_SESSION["user_info"] = $row;
                    $_SESSION["user_flag"] = true;
                    $_SESSION["unistatus"] = $row['unistatus'];
                    return true;
                }
                else{
                    return false;
                }
            } catch (PDOException $exc){
                echo 'Problemo: ' . $exc->getMessage();
                echo $conn->errorCode();
                echo $conn->errorInfo();
        }
    }

    public function register($fname,$lname,$password,$email,$unistatus){
        $query = $this->conn->prepare("INSERT INTO user(name,surname,password,email,unistatus) 
                                            VALUES(:fname, :lname, :password, :email, :unistatus)");
        $query->bindparam(":fname",$name);
        $query->bindparam(":lname",$surname);
        $query->bindparam(":password",$password);
        $query->bindparam(":email",$email);
        $query->bindparam(":unistatus",$unistatus);

        $query->execute();
    }

    public function logout(){

        session_destroy();
        unset($_SESSION["user_flag"]);
        header('Location: landingpage.php');
    }

    public function session_status(){
        if (isset($_SESSION["user_flag"])){
            return true;
        }
        else {
            return false;
        }
    }
}