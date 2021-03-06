<?php

require_once('config.php');
require('injecthtml/header.php');


if (!$user->session_status()){
  echo "<div style=\" text-align: center; color: red;\">Πρέπει να είστε συνδεδεμένος για να δείτε αυτή τη σελίδα</div>";
}else{
  
}

//An o xristis sundethei me epituxia tote emfanizetai to navigation bar, stoixeia gia to profile tou kai alles plirofories
if ($user->session_status()){
    require('navbar_student.php');
    //echo "<div style=\"color: red;\">Succesfull Login</div>";

    try{
      $uid = $_SESSION['user_id'];
      $stmt = $conn->prepare('SELECT * FROM accepted_thesis where accepted_thesis.stud_id = :uid');
      $stmt->execute(array('uid'=>$uid));
      //Elegxos gia to an uparxei ptuxiakh pou exei ginei dekti apo ton kathigiti
      $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      
       if (count($row) == 0) {
          $thesis = false;
       }else{
          $thesis = true;

          try{
            $unread_messages = 0;
            $stmt = $conn->prepare('Select * from messages where is_read = 0 AND uid = :uid');
            $stmt->bindparam(":uid",$uid);
            $stmt->execute();
            $row2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ( count($row) > 0){
            foreach($row2 as $r){
                 $unread_messages = $unread_messages + 1;
            }
          }

          }catch(PDOExeption $exc){
            echo 'Problem: '. $exc->getMessage();
            echo $conn->errorCode();
            echo $conn->errorInfo();
          }
       }


    }catch(PDOException $exc){
      echo $exc->getMessage();
      echo $conn->errorCode();
      echo $conn->errorInfo();
    }




    if(isset($_POST['btn-logout'])){
    $user->logout();
    }
}else{
  header("Location: landingpage.php");
}

?>

<form action="" method="post">
  <div class="row">
    <div class="container">
        <input type="submit" name="btn-logout" value="Logout" class="button button-primary">
    </div>
  </div>
</form>

<section id="profile" class="profile-page u-full-width">
    <div class="container">
      <div class="row">
        <div class="two-half column">
          <h2 class="pagePurpose">Καλωσήρθες <?php print_r($_SESSION['user_info'][name] .'!' )  ?></h2>
        </div>
      </div>
      <div class="row">
          <div class="two-half column">
              <table class="u-full-width">
              <thead>
                  <tr>
                  <th>Ονομα</th>
                  <th>email</th>
                  <th>Τίτλος πτυχιακής</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                  <td><?php echo($_SESSION['user_info'][name] . " " . $_SESSION['user_info'][surname]) ?> </td>
                  <td><?php echo($_SESSION['user_info'][email]) ?> </td>
                  <td><?php echo $r['name'] ?> </td>
                  </tr>
              </tbody>
            </table>
          </div>
      </div>
      <div class = "row">
        <h2 class="pagePurpose"> Πτυχιακή Εργασία </h2>
        <div class = "two-half column">

          <table class="card u-full-width">
          <thead>
            <tr>
              <th>Ονομα</th>
              <th>Κωδικός Καθηγητή</th>
              <th>Μη αναγνωσμένα μηνύματα</th> 
              <th>Συνομηλία</th>              
              <th>Gantt Chart</th>
            </tr>
          </thead>
            <tbody class = "styled-row">
          <?php
            if ($thesis == true);{
            foreach ( $row as $r){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $r['name'] . "</td>";
                    echo "<td>" . $r['faculty_id'] . "</td>";
                    echo "<td>" . $unread_messages . "</td>";
                    echo "<td>" . "<a class=' button button-primary ' href=#> Go <a/> </td>";
                    echo "<td>" . "<a class=' button button-primary ' href=gantt_chart.php> Chart <a/> </td>";
              echo "</tr>";
              echo "</tbody>";                                                                       
              }
            }
          ?>
        </table>
        </div>
      </div>

      <div class = "row">
        <h2 class = "pagePurpose"> Προσθήκη βιογραφικού</h2>
        <div class = "two-half column">
          <form method="post" action = "upload.php" enctype="multipart/form-data">
            File: <input type = "file" name = "uploaded_file">
            <input type="submit" name = "upload_cv">
          </form>
        </div>
      </div>
      <div class = "row">
        <h2 class = "pagePurpose"> Προσθήκη βαθμολογίας</h2>
        <div class = "two-half column">
          <form method="post" action = "upload.php" enctype="multipart/form-data">
            File: <input type = "file" name = "uploaded_file">
            <input type="submit" name = "upload_score">
          </form>
        </div>
      </div>
    </div>
</section>


<div class="blurred" </div>

<?php
  require('injecthtml/footer.php');
?>