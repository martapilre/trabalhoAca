<?php

class ValidationException extends Exception {

    private $errors = [];
    public function __construct($errors = [], $message = 'Validation Error', $code = 0, $previous = null) {
        parent::__construct($errors, $message, $code, $previous);
        $this->errors = $error;
    }

    // method to return array of errors
    public function getErrors(){
        return $this->errors;
    }

    // method to catch a specific error
    public function get($att){
        return $this->errors[$att];
    }
}