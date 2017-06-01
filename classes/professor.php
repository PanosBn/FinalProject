<?php

class professor extends user{


    function __construct(){
        parent::__construct();
        
    }

    public function submit_thesis($titlos,$stoxos,$perigrafi,$mathimata,$gnoseis,$submited,$started,$finalized,$number_of_students){

        try{
            
            $stmt = $this->conn->prepare('INSERT INTO thesis(name,stoxos,perigrafi,mathimata,gnoseis,submited,started,finalized)
                                                 VALUES (:titlos, :stoxos, :perigrafi, :mathimata, :gnoseis, :submitted, :started, :finalized)');
            $stmt->bindparam(":name", $titlos);
            $stmt->bindparam(":stoxos", $stoxos);
            $stmt->bindparam(":perigrafi", $perigrafi);
            $stmt->bindparam(":mathimata", $mathimata);
            $stmt->bindparam(":gnoseis", $gnoseis);
            $stmt->bindparam(":submited", $submited);
            $stmt->bindparam(":started", $started);
            $stmt->bindparam(":finalized", $finalized);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt->execute();
            return $stmt;
            
            } catch (PDOException $exc){
                echo 'Problemo: ' . $exc->getMessage();
                echo $conn->errorCode();
                echo $conn->errorInfo();
        }
    }


    }

?>