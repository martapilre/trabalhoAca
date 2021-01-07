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

    public function __set ($key, $value){
        $this->values[$key] = $value;
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
        $sql='';
        if(count($filters) > 0) {
            $sql .=" WHERE 1 = 1 ";
            foreach($filters as $column => $value) {
                $sql .= "AND ${column} = ".static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value) {
        if(is_null($value)){
            return "null";
        } elseif(gettype($value) === 'string'){
            return "'${value}'";
        } else {
            return $value;
        }
    }
}