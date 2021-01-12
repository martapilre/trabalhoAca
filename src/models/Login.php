<?php
class Login extends Model {

    // test if have an email and password to send specific errors
    public function validate() {
        $errors = [];

        // if dont insert an email
        if(!$this->email) {
            $errors['email'] = 'E-mail is a required field.';
        }
        // if user dont insert a password
        if(!$this->password) {
            $errors['password'] = 'Please, enter your password.';
        }

        // exception validations, only enter here, if the number of errors is greater than zero
        if(count($errors) > 0) {
            // when new ValidationException generated, go to controller
            throw new ValidationException($errors);
        }
    }

    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if($user) {
            //if user was hindering
            if($user->end_date) {
                throw new AppException('This user was hindered from logning in!');
            }
            //check password insert by user with DB password
            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException('Invalid User and Password!');
    }
}