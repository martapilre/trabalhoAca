<?php
require_once(realpath(MODEL_PATH).'/Model.php');

class User extends Model{
    //define maping with model BD 
    protected static $tableName = 'Users';
    //define maping with bd model 
    protected static  $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date', 
        'is_admin'
    ];
}