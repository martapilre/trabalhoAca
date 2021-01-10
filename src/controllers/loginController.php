<?php
loadModel('Login');
$exception = null;

if(count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        echo "User {$user->name} logged in!";
    } catch(AppException $e) {
        // when gets here go show exception
        $exception = $e;
    }
}


loadView('login', $_POST + ['exception' => $exception]);