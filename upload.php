<?php
require_once('config.php');

if (isset($_POST['upload'])){
    if (isset($_FILES['uploaded_file'])){
        $file_name = $_FILES['uploaded_file']['name'];
        $file_name = mt_rand(100,10000).$file_name;
        $file_name_tmp = $_FILES['uploaded_file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];

        $file_name = preg_replace("#[^a-z0-9.]#i","",$file_name);

        if (($file_size > 20000)){
            die("Το μέγεθος του αρχείου είναι μεγαλύτερο από το επιτρεπτό");
        }
        //$folder = "uploads/";
        move_uploaded_file($file_name_tmp,"upload/$file_name");

        //Egrafi sti vasi me to id tou xristi kai to onoma tou fakelou pou anevase
        $previous_url = $_SERVER['HTTP_REFERER'];
        if (preg_match('/studentpage/',$previous_url)){
            $file_use = "cv";
            $user->file_upload($file_name,$file_use);}
        else {
            $file_use = "regular";
            $user->file_upload($file_name,$file_use);}
        }
        Header("Location: " . $_SERVER['HTTP_REFERER']);

}

?>