<?php

class ValidationException extends Exception {

    private $errors = [];

    public function __construct($errors = [],
    $message = 'Validation ERROR',
    $code = 0, $previous = null) {
    parent::__construct($message, $code, $previous);
    $this->errors = $errors;
}

    // method to return array of errors
    public function getErrors() {
        return $this->errors;
    }

    // method to catch a specific error inside errors
    public function get($att) {
        return $this->errors[$att];
    }
}