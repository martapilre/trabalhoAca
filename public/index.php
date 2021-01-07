<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');


$user = new User (['name'=>'Carolina', 'email'=>'carolina@gmail.com']);
echo 'FIM';

/*
$sql = 'select * from users';
$result = Database::getResultFromQuery($sql);

//array assoc
while($row = $result->fetch_assoc()){
    print_r($row);
    echo '<br>';
}
*/