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
<script type="text/javascript" src="javascript/courses.js"></script>

<div class = "thesis_form">
        <h2 class="pagePurpose">Δημιουργία διπλωματικής εργασίας</h2>

        <div class = "container">
        <section class = "section-thesis">
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
                    <textarea  class = "u-full-width" placeholder = "Στόχοι..." name = "stoxos_diplomatikis" id = "stoxos_diplomatikis" > </textarea>
                </div>
                <div class = "row">
                    <label for ="perigrafi_diplomatikis">Περιγραφή διπλωματικής </label>
                    <textarea style="height: 150px;" class = "u-full-width" placeholder = "Μια σύντομη περιγραφή..." name = "perigrafi_diplom" id = "perigrafi_diplomatikis" > </textarea>
                </div>
                <div class = "row">
                    <label for ="mathimata">Προαπαιτούμενα μαθήματα </label>
                    <ul>
                        <li class="dropdown">
                        <a href="#" data-toggle="dropdown">First Menu <i class="icon-arrow"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" data-toggle="dropdown">Second Menu <i class="icon-arrow"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" data-toggle="dropdown">Third Menu <i class="icon-arrow"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        </li>
                    </ul>
                    <!--<ul id = "mathimata">
                        <li> 
                            5ο Εξάμηνο
                            <ul>
                                <ul>Κατανεμημένα συστήματα</ul>
                                <ul>Αλγόριθμοι και πολυπλοκότητα</ul>
                                <ul>Αρχιτεκτονική Υπολογιστών</ul>
                                <ul>Τηλεπικοινωνίες</ul>
                                <ul>Υπολογιστική λογική και Λογικός προγραμματισμός</ul>
                            </ul>
                        </li>
                        <li>
                            8ο Εξάμηνο
                            <ul>
                                <ul>Πιθανότητες και στατιστική</ul>
                                <ul>Αγγλικα 2</ul>
                                <ul>Σήματα και Συστήματα</ul>
                                <ul>Ψηφιακές Επικοινωνίες</ul>
                                <ul>Βάσεις Δεδομένων 2</ul>
                            </ul>
                        </li>
                    </ul>-->
                </div>
                <div class = "row">
                    <label for ="gnoseis">Προαπαιτούμενες Γνώσεις </label>
                    <textarea class = "u-full-width" placeholder = "Μια σύντομη περιγραφή..." id = "gnoseis" > </textarea>
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