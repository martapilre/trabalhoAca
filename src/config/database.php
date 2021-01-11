<?php

class Database {

    // method to get connection
    public static function getConnection() {
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $conn = new mysqli($env['host'], $env['username'],
            $env['password'], $env['database']);

        if($conn->connect_error) {
            die("Error: " . $conn->connect_error);
        }

        return $conn;
    }

    public static function getResultFromQuery($sql) {
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    // method to execute sql
    public static function executeSQL($sql){
        $conn = self::getConnection();
        // if you enter here, it means that an error happened
        if(!mysqli_query($conn, $sql)){
                throw new Exception(mysqli_error($conn));
        }
        //get entered id, close connection and return the id
        $id = $conn->insert_id;
        $conn->close();
        return $id;
    }

    
}