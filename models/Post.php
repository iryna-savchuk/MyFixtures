<?php

class Post extends AbstractAR {

    protected $fields = array(
        "id" => '',
        "name" => '',
        "text" => ''
    );

    protected function __construct() {
        parent::__construct();
    }

    public static function create() {
        return new Post;
    }

}