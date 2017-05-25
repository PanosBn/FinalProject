<?php
// require_once("session_init.php");
require_once 'config.php';
//require_once('user.php');
require('injecthtml/header.php');


if(isset($_POST['login'])){
    $email = $_POST['email'];
	$password = $_POST['password'];
    // print_r($email);
    // print_r( "<br /> ");
    // print_r($password);
	
	if($user->login($email,$password)){ 
		//$_SESSION['email'] = $email;
        // WRITE SESSION VARIABLES
        //print_r($_Session["user_info"]);
        if ($_SESSION["unistatus"] == "student"){
            header("Location: studentpage.php");
        } else{
            header("Location: facultypage.php");
        }
		//header("Location: sessionpage.php");
	} else {
		$error[] = 'Wrong email or password or your account has not been activated.';
        $error_email = true;
	}

}

// WHERE YOU MUST SEE USER INFORMATION
if(isset($USER)) {
    // SHOW user menu
}
?>

<div class="container">
  <section class = "loginSection">
    <div class="row">
        <div class="twelve columns">
            <div class="four columns offset-by-four">
                <br /><br /><br />
                <div class="section-loginorsignup">
                        <form method="POST" action="">
                            <div class="row">
                                <label for="emailInput">Email Χρήστη</label>
                                <input name="email"  type="text" id="emailInput" ; </input>
                                <?php
                                if(isset($error_email)) {
                                    echo "<div style=\"color: red;\">Invalid email</div>";
                                }
                                ?>
                            </div>
                                <div class="row">
                                <label for="passwordInput">Κωδικός</label>
                                <input name="password"  type="password" id="passwordInput" ; </input>
                            </div>
                            <div class="row">
                                <div class="container">
                                    <input type="submit" name="login" value="Είσοδος" class="button button-primary">
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <h5 class="value-description">Δεν είσαι μέλος; Γίνε τώρα!</h5>
                                <a class="button button-primary" href="/index.php">Εγγραφή</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>


<div class="blurred" </div>

<?php
require('injecthtml/footer.php');
?>