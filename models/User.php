<?php

class User extends AbstractAR {

    protected $fields = array(
        "id" => '',
        "name" => '',
        "last_name" => '',
        "age" => ''
    ); 

    protected function __construct() {
        parent::__construct();
    }

    public static function create() {
        return new User;
    }

}
