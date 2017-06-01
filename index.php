<?php
require_once('config.php');

/*if ($user->is_logged_in() ){ //An o xristis uparxei kai exei kanei login tote automata ginetai redirect stin kentriki selida
    header('Location: memberpage.php');
}*/
$error_flag = false;

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $fullname = $_POST['firstname'] + " " + $_POST['lastname'];
    $password = $_POST['password'];
    $unistatus = $_POST['acad_option'];
    
    // echo "submit POST succesfull";
    //print_r($_POST['acad_option']);

    if($firstname == ""){
      $error[] = "Εισάγετε το όνομα σας";
    }
    else if($lastname == ""){
      $error[] = "Εισάγετε το επίθετο σας";
    }    
    else if($unistatus == "") {
      $error[] = 'Εισάγετε την ιδιότητα σας';
    }
    else if(strcmp($_POST['password'], $_POST['passwordRe']) !== 0){
		  $error[] = 'Ο κωδικός δεν είναι σωστός.';
  	}
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Το email σας δεν είναι έγκυρο';
	  } 
    else{
      if ($user->searchEmail($email)){
        try{
          $prof = "Καθηγητής";
          $stud = "Φοιτητής";
          if ( strcmp($unistatus,$stud) == 0){
             $unistatus = "student";
             $student->register($firstname,$lastname,$password,$email,$unistatus);
             header("Location: landingpage.php" );
          }else{
             $unistatus = "professor";
             $professor->register($firstname,$lastname,$password,$email,$unistatus);
             header("Location: landingpage.php" );
          }
          // if($user->register($firstname,$lastname,$password,$email,$unistatus));{
          //   header("Location: landingpage.php" );
          // }
        }catch(Exception $exc){
          echo $exc->getMessage();
        }
      }
      else{
        $error[] = 'Το email αυτό δεν είναι διαθέσιμο';
      }
    }
}

$title = 'Signup';
require('injecthtml/header.php');


/*


*/

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
           <?php
            if (isset($error)){
              foreach($error as $error){
                ?>
                  <div class="alert">
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times; <?php echo $error; ?> </span> 
                  </div>
                  <?php
              }
            }
          ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="signup-form">
        <form method="post" action="">
          <div class="row">
            <div class="six columns">
              <label for="exampleEmailInput"> Email</label>
              <input name ="email" class="u-full-width" type="email" placeholder="name@icsd.aegean.gr" id="exampleEmailInput" ; </div>
            </div>
            <div class="six columns">
              <label for="academic_status"> Φοιτητής ή Καθηγητής</label>
              <select name = "acad_option" class="u-full-width">
                <option name ="student" type ="text">Φοιτητής</option>
                <option name ="faculty" type ="text">Καθηγητής</option>
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
  require('injecthtml/footer.php');
?>