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
                    $_SESSION['user_info'] = $row;
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

        //random userid
        $digits = 5;
        $rand_uid = rand(pow(10, $digits-3), pow(10, $digits)-1);
        $logged_in = 0;
        try{
            $stmt = $this->conn->prepare('INSERT INTO user(name,surname,uid,email,password,unistatus,logged_in)
                                                      VALUES (:fname, :lname, :rand_uid, :email, :password, :unistatus, :logged_in)');
           
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":rand_uid", $rand_uid);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":unistatus", $unistatus);
            $stmt->bindparam(":logged_in", $logged_in);

            $stmt->execute();

            return $stmt;
        }
        catch (PDOException $exc){
            echo 'Problemo: ' . $exc->getMessage();
            echo $conn->errorCode();
            echo $conn->errorInfo();
        }
    }

    public function searchEmail($given_email){
        try{
            $stmt = $this->conn->prepare('SELECT email FROM user where email = :email');
            $stmt->execute(array('email' => $given_email));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($stmt->rowCount() > 0){
                    return false;
                }else{
                    return true;
                }
        }catch (PDOException $exc){
                echo 'Problemo: ' . $exc->getMessage();
                echo $conn->errorCode();
                echo $conn->errorInfo();
        }
    }

    public function logout(){

        session_destroy();
        unset($_SESSION["user_flag"]);
        unset($_SESSION['user_info']);
        unset($_SESSION["unistatus"]);
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