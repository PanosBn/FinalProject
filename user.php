<?php

Class User{

    private $db;

    function _construct($db){
        $this->db = $db;
    }

    public function login($given_email, $given_password){
        try{
            $query = $this->db->prepare("SELECT * from user where email=:given_email and password=:given_password");
            $row = $query->execute(array(':email'=> $given_email, ':password'=>$given_password))->fetch(PDO::FETCH_ASSOC);

            if ($query->rowCount > 0) {
                $_SESSION['verified_proceed'] = $row['uid'];
                return true;
            }
            else{
                return false;
            }
        } catch (PDOException $exc){
            echo '<p class="bg-danger">'.$exc->getMessage().'</p>';
        }
    }

    public function register($fname,$lname,$password,$email,$unistatus){
        $query = $this->db->prepare("INSERT INTO user(name,surname,password,email,unistatus) 
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
        header('Location: landingpage.php');
    }
}