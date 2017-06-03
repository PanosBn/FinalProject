<?php

require_once('config.php');
require('injecthtml/header.php');


if (!$user->session_status()){
  echo "<div style=\" text-align: center; color: red;\">Πρέπει να είστε συνδεδεμένος για να δείτε αυτή τη σελίδα</div>";
}

//An o xristis sundethei me epituxia tote emfanizetai to navigation bar, stoixeia gia to profile tou kai alles plirofories
if ($user->session_status()){
    require('navbar_student.php');
    //echo "<div style=\"color: red;\">Succesfull Login</div>";

    
    if(isset($_POST['btn-logout'])){
    $user->logout();
    }
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
                  <td>Χωρίς ανάθεση</td>
                  </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
</section>


<div class="blurred" </div>

<?php
  require('injecthtml/footer.php');
?>