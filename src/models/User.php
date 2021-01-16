<?php
class User extends Model{
    //define maping with model BD 
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin'
    ];

    public static function getActiveUsersCount() {
        return static::getCount(['raw' => 'end_date IS NULL']);
    }

    public function insert() {
        $this->validate();
        // if isn't admin, admin=0
        $this->is_admin = $this->is_admin ? 1 : 0;
        // if dont have end_date, end_date==null
        if(!$this->end_date) $this->end_date = null;
        // cript password with default algorithm
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::insert();
    }

    public function update() {
        $this->validate();
        $this->is_admin = $this->is_admin ? 1 : 0;
        if(!$this->end_date) $this->end_date = null;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::update();
    }

    private function validate() {
        $errors = [];

        if(!$this->name) {
            $errors['name'] = 'Name is a required field.';
        }

        if(!$this->email) {
            $errors['email'] = 'Email is a required field.';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email.';
        }

        if(!$this->start_date) {
            $errors['start_date'] = 'Start date is a required field.';
        } elseif(!DateTime::createFromFormat('Y-m-d', $this->start_date)) {
            $errors['start_date'] = 'Start date must follow the standard dd/mm/yyyy.';
        }

        if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {
            $errors['end_date'] = 'End date must follow the standard dd/mm/yyyy.';
        }

        if(!$this->password) {
            $errors['password'] = 'Password is a require field.';
        }

        if(!$this->confirm_password) {
            $errors['confirm_password'] = 'Confirm password is a require field.';
        }

        if($this->password && $this->confirm_password 
            && $this->password !== $this->confirm_password) {
            $errors['password'] = 'Passwords dont match.';
            $errors['confirm_password'] = 'Passwords dont match.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
}