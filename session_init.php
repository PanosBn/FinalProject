<?php
session_start();
if(isset($_SESSION['username'])) {
    $USER = array();    // array with user information
    // SELECT FROM table users WHERE name=$_SESSION['username']
    // $USER = information from table
    //$USER['id'] = 
    //$USER['email'] = 'x';
}