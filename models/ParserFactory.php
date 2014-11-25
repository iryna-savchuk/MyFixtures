<?php

abstract class ParserFactory implements Factory {

    public static function produce($fileName) {
        $path_info = pathinfo($fileName);
        $extension = ucfirst(strtolower($path_info['extension']));
        $parser = $extension . 'Parser';
        if (!class_exists($parser)) {
            throw new Exception('Missing parser for this format.');
        }
        return new $parser;
    }
}
