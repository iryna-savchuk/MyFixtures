<?php

class JsonParser implements Parser {

    public static function parse($content) {
        if (empty($content)) {
            return false;
        }
        $data = json_decode($content, true);
        return $data;
    }

}
