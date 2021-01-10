<?php

// this class extends default class Exception
class AppException extends Exception {

    // to replace generic exceptions for more expecific exceptions
    public function __construct($message, $code = 0, $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}