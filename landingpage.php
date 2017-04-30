<?php 
require_once('config.php');
require('header.php');


if(isset($_POST['submit'])){
    $username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		header('Location: sessionpage.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password or your account has not been activated.';
        $error_username = True;
	}

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
                                <label for="username">Ονομα Χρήστη</label>
                                <input name="username"  type="text" id="firstNameInput" ; </input>
                                <?php
                                if(isset($error_username)) {
                                    echo "<div style=\"color: red;\">Invalid username</div>";
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