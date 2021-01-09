<?php
loadModel('Login');

//if we have inside post email and pass
if(count($_POST) > 0){
    //we pass this values for Login
    $login = new Login($_POST);
    try {
        //if login are correct
        $user = $login->checkLogin();
        echo "User {$user->name} logged in";
    } catch (Exception $e) {
        //not correct
        echo 'Fail';
    }
}


loadView('login', $_POST);