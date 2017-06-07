<?php
require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    if ($_SESSION["unistatus"] == "professor"){
    require('navbar.php');

    try{

        $uid = $_SESSION['user_id'];
        $stmt=$conn->prepare('Select accepted_thesis.name, user.uid from accepted_thesis JOIN user on user.uid = accepted_thesis.stud_id  and accepted_thesis.faculty_id = :uid');
        $stmt->bindparam(":uid", $uid);
        
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);       

    }catch(PDOException $exc){
        echo 'Problem' . $exc->getMessage();
        echo $conn->errorCode();
        echo $conn->errorInfo();
    }



    }else{
        Header("Location: landingpage.php");
    }
}else{
    Header("Location: landingpage.php");
}

?>

    <div class="ongoing-thesis-list">
        <h2 class="pagePurpose">Αιτήσεις Φοιτητών</h2>
        <div class="container">
            <div class="row">
                <section class="thesis-list">
                    <table id="tableId" class="card u-full-width">
                        <thead>
                            <tr>
                                <th>Τίτλος Πτυχιακής</th>
                                <th>Κωδικός Φοιτητή</th>
                                <th>Μη αναγνωσμένα μηνύματα</th>
                                <th>Συνομιλία</th>
                                <th>Gannt Chart Εργασίας</th>
                                <th>Υποβολή Εργασίας</th>
                            </tr>
                        </thead>
                        <tbody class = "styled-row">
                        <?php
                            foreach ( $row as $r){
                                
                                $student_id = $r['uid'];
                                $titlos_ptuxiakis = $r['name'];

                                //Euresi mi anagnwsmenwn minimatwn
                                try{
                                    $unread_messages = 0;
                                    $stmt = $conn->prepare('Select * from messages where is_read = 0');
                                    $stmt->execute();
                                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if ( count($row) > 0){
                                        foreach($row as $r){
                                            $unread_messages = $unread_messages + 1;
                                        }
                                    }

                                }catch(PDOExeption $exc){
                                    echo 'Problem: '. $exc->getMessage();
                                    echo $conn->errorCode();
                                    echo $conn->errorInfo();
                                }
                                echo "<br />";
                                echo "<br />";
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $titlos_ptuxiakis . "</td>";
                                echo "<td>" . $student_id . "</td>";
                                echo "<td>" . $unread_messages . "</td>";
                                echo "<td>" . "<a class=' button button-primary ' href=#> Go <a/> </td>";
                                echo "<td>" . "<a class=' button button-primary ' href=gantt_chart.php> Chart <a/> </td>";
                                echo "<td>" . "<a class=' button button-primary ' href=#> Υποβολή <a/> </td>";
                            }

                        ?>
<div class="blurred" </div>

<?php
  require('injecthtml/footer.php');
?>