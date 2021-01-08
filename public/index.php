<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
//require_once(VIEW_PATH.'/login.php');

require_once(MODEL_PATH . '/Login.php');

$login = new Login([
    'email' => 'admin@esg.ipsantarem.pt',
    'password' => '123'
]);

try{
    $login->checkLogin();
    echo 'Tudo ok';
} catch (Exception $e){
    echo 'Error in your login';
}