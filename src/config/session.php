<?php

//if is valid it continues, if it doesn't redirect to login view
function requireValidSession($requiresAdmin = false){
    //$_SESSION is an associative array containing session variables available to the current script
    $user = $_SESSION['user'];
    if(!isset($user)) {
        header('Location: login.php');
        exit();
    //if user dont exists
    } elseif($requiresAdmin && !$user->is_admin) {
        addErrorMsg('Access denied!');
        header('Location: day_records.php');
        exit();
    }
}
