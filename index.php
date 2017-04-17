<?php
require_once('config.php');

/*if ($user->is_logged_in() ){ //An o xristis uparxei kai exei kanei login tote automata ginetai redirect stin kentriki selida
    header('Location: memberpage.php');
}*/

if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $name = $_Post['firstname'] + " " + $_POST['lastname'];
    echo "submit POST succesfull";
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        //echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }

    /*
    if(strlen($_POST['username']) < 5){
        $error[] = 'Username is too short';
    }else{
        $check_name_query = $db->prepare('select username from registered where username = :name');
        $check_name_query->execute(array(':username' => $_POST['username']));
        $row = $check_name_query->fetch(PDO::FETCH_ASSOC);

        if(!empty($row['username'])){
            $error[] = 'Username is currently in use';
        }
    }*/

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
            </div>
            <div class="six columns">
              <label for="teacherOrStudent"> Φοιτητής ή Καθηγητής</label>
              <select class="u-full-width" id="teacherOrStudent">
                <option name ="student" value="Option 1">Φοιτητής</option>
                <option name ="faculty" value="Option 2">Καθηγητής</option>
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