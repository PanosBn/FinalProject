<?php

require_once('config.php');
require('injecthtml/header.php');

if (!$user->session_status()){
  echo "<div style=\" text-align: center; color: red;\">Πρέπει να είστε συνδεδεμένος για να δείτε αυτή τη σελίδα</div>";
}

if(isset($_POST['btn-logout'])){
  echo "<div style=\"color: red;\">Succesfull Login</div>";
  $user->logout();
}

?>

<div class="navigation">
    <nav class="container topnav">
        <div class="twelve columns">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Δημιουργία διπλωματικής</a></li>
                <li><a href="#">Αιτήσεις</a></li>
                <li><a href="#">Συνομηλίες</a></li>
                <li><a href="#">Στατιστικά</a></li>
            </ul>
        </div>
    </nav>
</div>
                


<form action="" method="post">
  <div class="row">
    <div class="container">
        <input type="submit" name="btn-logout" value="Logout" class="button button-primary">
    </div>
  </div>
</form>

<div class="blurred" </div>

<?php
  require('injecthtml/footer.php');
?>