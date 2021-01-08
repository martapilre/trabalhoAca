<?php
require_once(realpath(MODEL_PATH . '/User.php'));

class Login extends Model{

    public function checkLogin(){
        $user = User::getOne(['email' => $this->email]);

        if($user) {
            //check password insert by user with DB password
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }
        throw new Exception();
    }
}