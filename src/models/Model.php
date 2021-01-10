<?php

class Model {
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr) {
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }

    public function __get ($key){
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
        $result = static::getResultFromSelect($filters, $columns);
        //with a valid result will fetch first regist, if not result=null
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function get($filters = [], $columns = '*'){
        $objects = [];
        $result = static::getResultFromSelect($filters, $columns);
        if($result){
            //see which class was called function get
            $class = get_called_class();
            //pass array into the user constructor, which passes to the model constructor and ends up building User objects
            while($row = $result->fetch_assoc()){
                //insrt new instance q/push inside objects
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }


    public static function getResultFromSelect($filters = [], $columns = '*'){
        $sql = "SELECT ${columns} FROM "
        . static::$tableName
        . static::getFilters($filters);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0){
            return null;
        } else {
            return $result;
        }
    }

    //return sql represents selct from model
    private static function getFilters($filters) {
        $sql = '';
        if(count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }
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