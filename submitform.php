<?php

require_once('config.php');
require('injecthtml/header.php');

if ($user->session_status()){
    require('navbar.php');

    if (isset($_POST['submit'])){
        $titlos = ($_POST['title']);
        $stoxos = ($_POST['stoxos_diplomatikis']);
        $perigrafi = ($_POST['perigrafi_diplom']);
        $mathimata = ($_POST['mathimata']);
        $gnoseis = ($_POST['gnoseis']);
        $submitance_date = ($_POST['submitance_date']);
        $starting_date = ($_POST['starting_date']);
        $finishing_date = ($_POST['finishing_date']);
        $number_of_students = ($_POST['number_of_students']);

        //print_r($_POST);
        if ($user->submit_thesis($titlos,$stoxos,$perigrafi,$mathimata,$gnoseis,$submitance_date,$starting_date,$finishing_date,$number_of_students)){
            print_r($_POST);
            echo 'succesfull';
        }
        // if ( $user->test_query() ){
        //     echo 'succesfull';
        // }
    }
     
    if(isset($_POST['btn-logout'])){
    $user->logout();
    }
}
?>

<div class = "thesis_form">
        <h2 class="pagePurpose">Δημιουργία διπλωματικής εργασίας</h2>

        <div class = "container" style = "margin-bottom: 50px;">
        <section class = "section-thesis">
        <form method = "post" action = "">
                <div class = "row">
                    <div class = "four columns" >
                        <label for ="thesis_title">Τίτλος διπλωματικής</label>
                        <input class = "u-full-width" name = "title" type ="text" id = "thesis_title">
                    </div>
                    <div class = "four columns">
                        <label for = "overseeing_prof">Επιβλέπων</label>
                        <h5 class = "u-full-width" id = "overseeing_prof"><?php print_r($_SESSION['user_info'][name] .' ' .  $_SESSION['user_info'][surname] .' ' .$_SESSION['user_info']['email'] )  ?> </h5>
                    </div>
                    <div class = "four columns">
                        <label for = "number_of_students" > Αριθμός Φοιτητών </label>
                        <select class = "u-full-width" name = "number_of_students" id = "number_of_students">
                            <option name = "1" value ="Option 1"> 1 </option>
                            <option name = "2" value ="Option 2"> 2 </option>
                            <option name = "3" value ="Option 3"> 3 </option>
                        </select>
                    </div>
                </div>
                <div class = "row">
                    <label for ="stoxos_diplomatikis">Στόχος διπλωματικής </label>
                    <textarea  class = "u-full-width"  name = "stoxos_diplomatikis" id = "stoxos_diplomatikis" > </textarea>
                </div>
                <div class = "row">
                    <label for ="perigrafi_diplomatikis">Περιγραφή διπλωματικής </label>
                    <textarea style="height: 150px;" class = "u-full-width" name = "perigrafi_diplom" id = "perigrafi_diplomatikis" > </textarea>
                </div>
                <div class = "row">
                    <label for ="mathimata">Προαπαιτούμενα μαθήματα </label>
                    <textarea class = "u-full-width"  name = "mathimata" id = "mathimata" > </textarea>
                </div>
            
                <div class = "row">
                    <label for ="gnoseis">Προαπαιτούμενες Γνώσεις </label>
                    <textarea class = "u-full-width"  name = "gnoseis" id = "gnoseis" > </textarea>
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
                <div class = "row" style = "padding-top: 5px">            
                        <input class = "button-primary" style = "background-color : #08A4bd;" type = "submit" value = "Υποβολη" name = "submit"> 
                </div>
        </form>
        </section>
        </div>
</div>


<div class="blurred" </div>

<?php
require('../injecthtml/footer.php');
?>