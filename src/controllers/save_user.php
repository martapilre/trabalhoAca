<?php
session_start();
requireValidSession(true);

$exception = null;
$userData = [];

// if count all elements post in array == 0 and has a att get of update
if(count($_POST) === 0 && isset($_GET['update'])) {
    // aplly filter id
    $user = User::getOne(['id' => $_GET['update']]);
    // get values of user
    $userData = $user->getValues();
    // user need write password again
    $userData['password'] = null;
// if these elements ara > 0
} elseif(count($_POST) > 0) {
    try {
        $newUser = new User($_POST);
        if($newUser->id) {
            $newUser->update();
            addSuccessMsg('User changed successfully!');
            // send for users
            header('Location: users.php');
            exit();
        } else {
            $newUser->insert();
            addSuccessMsg('User successfully registered!');
        }
        $_POST = [];
    } catch(Exception $e) {
        $exception = $e;
    } finally {
        $userData = $_POST;
    }
}

loadTemplateView('save_user', $userData + ['exception' => $exception]);