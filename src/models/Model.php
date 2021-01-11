<?php

class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr, $sanitize = true) {
        $this->loadFromArray($arr, $sanitize);
    }

    public function loadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public function getValues() {
        return $this->values;
    }

    public static function getOne($filters = [], $columns = '*'){
        //see which class was called function get
        $class = get_called_class();
        //get reult from select
        $result = static::getResultSetFromSelect($filters, $columns);
        //with a valid result will fetch first regist, if not result=null
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function get($filters = [], $columns = '*'){
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result){
            //see which class was called function get
            $class = get_called_class();
            //pass array into the user constructor, which passes to the model constructor and ends up building User objects
            while($row = $result->fetch_assoc()) {
                //insrt new instance q/push inside objects
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }


    public static function getResultSetFromSelect($filters = [], $columns = '*') {
        $sql = "SELECT ${columns} FROM "
            . static::$tableName
            . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    // insert data in db
    public function insert(){
        // comand to insert data
        $sql = "INSERT INTO " . static::$tableName . " ("
        //get an array and transform it into a string, implode -> Join array elements with a string
        . implode(",", static::$columns) . ") VALUES (";
        // to cycle through all the columns
        foreach(static::$columns as $col) {
            // append sql for each values
            $sql .= static::getFormatedValue($this->$col) . ",";
        }
        // last elemtent da string
        $sql[strlen($sql) - 1] = ')';
        // reust is id from user
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }

    public function update() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        // scroll through the col and update
        foreach(static::$columns as $col) {
            $sql .= " ${col} = " . static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ' ';
        $sql .= "WHERE id = {$this->id}";
        Database::executeSQL($sql);
    }

    //return sql represents selct from model
    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                if($column == 'raw') {
                    $sql .= " AND {$value}";
                } else {
                    $sql .= " AND ${column} = " . static::getFormatedValue($value);
                }
            }
        } 
        return $sql;
    }

    // formate values
    private static function getFormatedValue($value) {
        if(is_null($value)) {
            return "null";
        } elseif(gettype($value) === 'string') {
            return "'${value}'";
        } else {
            return $value;
        }
    }
}