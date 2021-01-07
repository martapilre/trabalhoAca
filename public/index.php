<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

$user = new User (['name'=>'Carolina', 'email'=>'carolina@gmail.com']);
//echo $user->getSelect();

print_r(User::get(['name' => Marta], 'id, name, email'));
echo '<br>';
print_r(User::get([], 'name'));
echo '<br>';
foreach(User::get([], 'name') as $user){
    echo $user->name;
    echo '<br>';
}
