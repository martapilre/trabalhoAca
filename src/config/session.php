<?php

//if is valid it continues, if it doesn't redirect to login view
function requiredValidSession(){
    //$_SESSION is an associative array containing session variables available to the current script
    $user = $_SESSION['user'];
    //if user dont exists
    if(!isset($user)) {
        //redirect to login
        header('Location: login.php');
        exit();
    }
}
