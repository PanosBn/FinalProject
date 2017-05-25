<?php

require_once('config.php');
require('header.php');

if (!$user->session_status()){
  echo "<div style=\" text-align: center; color: red;\">Πρέπει να είστε συνδεδεμένος για να δείτε αυτή τη σελίδα</div>";
}

if(isset($_POST['btn-logout'])){
  echo "<div style=\"color: red;\">Succesfull Login</div>";
  $user->logout();
}

?>


<form action="" method="post">
  <div class="row">
    <div class="container">
        <input type="submit" name="btn-logout" value="Logout" class="button button-primary">
    </div>
  </div>
</form>

<div class="blurred" </div>

<?php
  require('footer.php');
?>