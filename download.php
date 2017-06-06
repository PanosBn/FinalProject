<?php
require_once('config.php');

if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {

    $filename = $_GET['file'];
    // echo $filename;
    // echo '<br />';
    $erro_info = "Λυπόμαστε αλλά υπάρχει κάποιο πρόβλημα με το αρχείο που ζητησατε.";
    $filepath = 'upload/'.$filename;
    if (file_exists( $filepath) && is_readable( $filepath)) {
        $size = filesize( $filepath);
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.$size);
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        $file = @ fopen( $filepath, 'rb');
        if ($file) {
            fpassthru($file);
            exit;
            }
        else{
            echo $erro_infoerr;
            }
    }
    else{
        echo $erro_info;
    }
} 

else {
    $filename = NULL;
    }

?>