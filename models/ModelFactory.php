<?php

abstract class ModelFactory implements Factory {

    public static function produce($fileName) {
        $path_info = pathinfo($fileName);
        $model = ucfirst(strtolower($path_info['filename']));
        if (!class_exists($model)) {
            throw new Exception('Missing model.');
        }
        return $model::create();
    }
}


