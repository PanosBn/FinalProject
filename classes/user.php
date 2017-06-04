<?php

class User{

    public $conn;

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
                    $_SESSION['user_id'] = $row['uid'];
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

    public function submit_thesis($titlos,$stoxos,$perigrafi,$mathimata,$gnoseis,$submited,$started,$finalized,$number_of_students){


        
        try{
            $stmt = $this->conn->prepare('INSERT INTO thesis(name,stoxos,perigrafi,mathimata,gnoseis,submited,number_of_students,started,finalized,faculty_id)
                                                 VALUES (:titlos, :stoxos, :perigrafi, :mathimata, :gnoseis, :submited, :number_of_students, :started, :finalized, :faculty_id)');

            $uid = $_SESSION['user_id'];
            $stmt->bindparam(":titlos", $titlos);
            $stmt->bindparam(":stoxos", $stoxos);
            $stmt->bindparam(":perigrafi", $perigrafi);
            $stmt->bindparam(":mathimata", $mathimata);
            $stmt->bindparam(":gnoseis", $gnoseis);
            $stmt->bindparam(":submited", $submited);
            $stmt->bindparam(":number_of_students", $number_of_students);
            $stmt->bindparam(":started", $started);
            $stmt->bindparam(":finalized", $finalized);
            $stmt->bindparam(":faculty_id", $uid);

            $stmt->execute();
            
            } catch (PDOException $exc){
                echo 'Problemo: ' . $exc->getMessage();
                echo $conn->errorCode();
                echo $conn->errorInfo();
        }
    }

    public function thesis_list(){

        try{
            $stmt = $this->conn->prepare('SELECT * FROM thesis where thesis.faculty_id = :uid');
            $uid = $_SESSION['user_id'];
            $stmt->execute(array('uid'=>$uid));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (PDOException $exc){
            echo 'Problemo' . $exc->getMessage();
            echo $conn->errorCode();
            echo $conn->errorInfo();

        }
    }

    public function thesis_enquiry($thesis_id,$faculty_id){

        try{
            $stmt = $this->conn->prepare('INSERT INTO thesis_enquiry(thesis_id,faculty_id,stud_id)
                                                      VALUES (:thesis_id, :faculty_id, :stud_id)');
            $stud_id = $_SESSION['user_id'];
            $stmt->bindparam(":thesis_id", $thesis_id);
            $stmt->bindparam(":faculty_id", $faculty_id);
            $stmt->bindparam(":stud_id", $stud_id);

            $stmt->execute();

            return $stmt;
        }
        catch (PDOException $exc){
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