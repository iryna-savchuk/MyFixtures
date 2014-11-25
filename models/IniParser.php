<?php

class IniParser implements Parser {

    public static function parse($content) {
        if (empty($content)) {
            return false;
        }
        $array = parse_ini_string($content, true);
        $array = self::parse_ini_advanced($array);
        return $array;
    }

    private static function parse_ini_advanced($array) {
        $returnArray = array();
        $tmp = array();
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $e = explode('.', $key);
                $tmp[$e[1]][$e[2]] = $value;
            }
        }
        foreach ($tmp as $key => $value) {
            $ar = array();
            $ar['id'] = $key;
            $ar = array_merge($ar, $value);
            $returnArray[] = $ar;
        }
        return $returnArray;
    }

}
