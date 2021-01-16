<?php
session_start();
requireValidSession(true);


$exception = null;
if(isset($_GET['delete'])) {
    try {
        User::deleteById($_GET['delete']);
        addSuccessMsg('User deleted successfully');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {
            addErrorMsg('It is not possible to delete user with punchs');
        } else {
            $exception = $e;
        }
    }
}

$users = User::get();
foreach($users as $user) {
    $user->start_date = (new DateTime($user->start_date))->format('d/m/Y');    
    if($user->end_date) {
        $user->end_date = (new DateTime($user->end_date))->format('d/m/Y');
    }
}

loadTemplateView('users', [
    'users' => $users,
    'exception' => $exception
]);