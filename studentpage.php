<?php

require_once('config.php');
require('header.php');


if (!$user->session_status()){
  echo "<div style=\" text-align: center; color: red;\">Πρέπει να είστε συνδεδεμένος για να δείτε αυτή τη σελίδα</div>";
}

//An o xristis sundethei me epituxia tote emfanizetai to navigation bar, stoixeia gia to profile tou kai alles plirofories
if ($user->session_status()){
    require('navbar.php');
    echo "<div style=\"color: red;\">Succesfull Login</div>";

    
    if(isset($_POST['btn-logout'])){
    $user->logout();



    }
}

?>

<!--<div class="navigation">
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
</div>-->

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
          <h2 class="pagePurpose">Στοιχεία Χρήστη</h2>
        </div>
      </div>
    </div>
    <div class="container">

    </div>
</section>

<div class="blurred" </div>

<?php
  require('footer.php');
?>