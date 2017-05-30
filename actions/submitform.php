<?php

require_once('../config.php');
require('../injecthtml/header.php');

if ($user->session_status()){
    require('../injecthtml/navbar.php');
     
    if(isset($_POST['btn-logout'])){
    $user->logout();
    }
}
?>

<!--<div class = "container">
    <div class = "thesis-form">
        <form>
        <div class="row">
            <div class="six columns">
            <label for="exampleEmailInput">Your email</label>
            <input class="u-full-width" type="email" placeholder="test@mailbox.com" id="exampleEmailInput">
            </div>
            <div class="six columns">
            <label for="exampleRecipientInput">Reason for contacting</label>
            <select class="u-full-width" id="exampleRecipientInput">
                <option value="Option 1">Questions</option>
                <option value="Option 2">Admiration</option>
                <option value="Option 3">Can I get your number?</option>
            </select>
            </div>
        </div>
        <label for="exampleMessage">Message</label>
        <textarea class="u-full-width" placeholder="Hi Dave …" id="exampleMessage"></textarea>
        <label class="example-send-yourself-copy">
            <input type="checkbox">
            <span class="label-body">Send a copy to yourself</span>
        </label>
        <input class="button-primary" type="submit" value="Submit">
        </form>
    </div>
</div>-->

<div class = "thesis_form">
        <h2 class="pagePurpose">Δημιουργία διπλωματικής εργασίας</h2>

        <div class = "container">
        <form method = "post" action = "">
                <div class = "row">
                    <div class = "four columns" >
                        <label for ="thesis_title">Τίτλος διπλωματικής</label>
                        <input class = "u-full-width" name = "title" type ="text" placeholder="Τίτλος" id = "thesis_title">
                    </div>
                    <div class = "four columns">
                        <label for = "overseeing_prof">Επιβλέπων</label>
                        <h5 class = "u-full-width" id = "overseeing_prof"><?php print_r($_SESSION['user_info'][name] .' ' .  $_SESSION['user_info'][surname])  ?> </h5>
                    </div>
                    <div class = "four columns">
                        <label for = "number_of_students" > Αριθμός Φοιτητών </label>
                        <select class = "u-full-width" id = "number_of_students">
                            <option value ="Option 1"> 1 </option>
                            <option value ="Option 2"> 2 </option>
                            <option value ="Option 3"> 3 </option>
                        </select>
                    </div>
                </div>
                <div class = "row">
                    <label for ="stoxos_diplomatikis">Στόχος διπλωματικής </label>
                    <textarea  class = "u-full-width" placeholder = "Στόχοι..." id = "stoxos_diplomatikis" > </textarea>
                </div>
                <div class = "row">
                    <label for ="perigrafi_diplomatikis">Περιγραφή διπλωματικής </label>
                    <textarea style="height: 200px;" class = "u-full-width" placeholder = "Μια σύντομη περιγραφή..." id = "perigrafi_diplomatikis" > </textarea>
                </div>
                <div class = "row">
                    <div class = "four columns">
                        <label for = "date_submitted">Ημερομηνια υποβολής</label>
                        <input class = "u-full-width" type = "date" name = "submitance_date" id = "date_submitted">
                    </div>
                    <div class = "four columns">
                        <label for = "date_undertaken">Ημερομηνια ανάληψης</label>
                        <input class = "u-full-width" type = "date" name = "starting_date" id = "date_undertaken">
                    </div>
                    <div class = "four columns">
                        <label for = "date_completed">Ημερομηνια περάτωσης</label>
                        <input class = "u-full-width" type = "date" name = "finishing_date" id = "date_completed">
                    </div>
                </div>
        </form>
        </div>
</div>


<div class="blurred" </div>

<?php
require('../injecthtml/footer.php');
?>