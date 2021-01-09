<?php
loadModel('User');

class Login extends Model{

    public function checkLogin(){
        $user = User::getOne(['email' => $this->email]);
        if($user) {
            //if user was hindering
            if($user->end_date){
                throw new AppException('User was hindered from logning in!');
            }
            //check password insert by user with DB password
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }
        throw new AppException('Invalid User and Password!');
    }
}