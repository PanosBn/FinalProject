<?php
require_once('config.php');

/*if ($user->is_logged_in() ){ //An o xristis uparxei kai exei kanei login tote automata ginetai redirect stin kentriki selida
    header('Location: memberpage.php');
}*/
$error_flag = false;

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['firstname'] + " " + $_POST['lastname'];
    $password = $_POST['password'];
    $unistatus = $_POST['teacherOrStudent'];
    echo "submit POST succesfull";
    print_r($_POST);
    
    if(strlen($_POST['username']) < 5) {
      $error[] = 'Το username πρέπει να αποτελείται απο τουλάχιστον 5 χαρακτήρες';
      $error_flag = true;
    }
    if($_POST['password'] != $_POST['passwordConfirm']){
		  $error[] = 'Ο κωδικός δεν είναι σωστός.';
      $error_flag = true;
  	}
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
      $error_flag = true;
	  } else {
      $stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
      $row = $stmt->execute(array(':email' => $_POST['email']))->fetch(PDO::FETCH_ASSOC);
      if(!empty($row['email'])){
          $error[] = 'Email provided is already in use.';
          $error_flag = true;
      }
    }
  // } else{
  //   $check_name_query = $db->prepare('select username from registered where username = :firstname');
  //   $check_name_query->execute(array(':username' => $_POST['firstname']));
  //   $row = $check_name_query->fetch(PDO::FETCH_ASSOC);
  //   if(!empty($row['firstname'])) {
  //       $error[] = 'Username is currently in use';
  //   }
  }

$title = 'Signup';
require('header.php');

?>


<!-- Signup Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<section id="toggle" class="toggle u-full-width">
    

</section>

  
  <section id="signup" class="signup u-full-width">
    <div class="container">
      <div class="row">
        <div class="two-half column">
          <h2 class="pagePurpose">Συμπληρώστε τα στοιχεία σας</h2>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="signup-form">
        <form method="post" action="">
          <div class="row">
            <div class="six columns">
              <label for="exampleEmailInput"> Email</label>
              <input class="u-full-width" type="email" placeholder="name@icsd.aegean.gr" id="exampleEmailInput" ; </div>
              <?php
                                if(isset($error_flag)) {
                                    echo "<div style=\"color: red;\">$error</div>";
                                }
                                ?>
            </div>
            <div class="six columns">
              <label for="teacherOrStudent"> Φοιτητής ή Καθηγητής</label>
              <select class="u-full-width" name = "teacherOrStudent" id="teacherOrStudent">
                <option name ="student" type ="text" value="Φοιτητής">Φοιτητής</option>
                <option name ="faculty" type ="text" value="Καθηγητής">Καθηγητής</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="six columns">
              <label for="firstNameInput">Όνομα</label>
              <input  name="firstname" class="u-full-width" type="text" placeholder="Όνομα" id="firstNameInput" ; </div>
            </div>
            
            <div class="six columns">
              <label for="lastNameInput">Επώνυμο</label>
              <input  name="lastname" class="u-full-width" type="text" placeholder="Επώνυμο" id="lastNameInput" ; </div>
            </div>
          </div>
          <div class="row">
            <div class="six columns">
              <label for="passwordInput">Κωδικός</label>
              <input name="password" class="u-full-width" type="password" placeholder="Κωδικός" id="passwordInput" ; </div>
            </div>
            <div class="six columns">
              <label for="passwordValidationInput">Επαλύθευση Κωδικού</label>
              <input name="passwordRe" class="u-full-width" type="password" placeholder="Εισάγετε ξανά τον Κωδικό" id="passwordValidationInput" ; </div>
            </div>
          </div>
          <div class="row">
            <div class="six columns">
              <label for="mathCaptcha">Human?</label>
              <input name="security" class="u-full-width" type="text" placeholder="Πόσο κάνει 5+12;" id="matchCaptcha" ; </div>
            </div>
          </div>
          <div class="row">
            <div class="six collumns">
                <div class="container">
                    <input type="submit" name ="submit" value="Εγγραφή" class="button button-primary">
               </div>
            </div>
          </div> 
        </form>
      </div>
    </div>
    <div class="section confirm">

    </div>
    <div class="blurred" </div>
  </section>
  <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<?php
  require('footer.php');
?>