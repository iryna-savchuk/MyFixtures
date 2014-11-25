<?php

class Worker {

    protected $data;
    protected $model;

    function __construct() {
        parent::__construct();
    }
/**
 * This is the function for importing data from files to database
 * 
 * @global $appPath - the path where directory "fixtures" can be found
 * @param string $fileName 
 * 
 * @return string containing result
 */
    public static function Work($fileName) {
        global $appPath;
        $filePath = $appPath . "./fixtures/" . $fileName;
        if (!file_exists($filePath)) {   //cheking whether the file exists
            return 'File not found.';
        }
        try {
            $parser = ParserFactory::produce($fileName); //the corresponding parser
            $content = file_get_contents($filePath, true);
            $data = $parser::parse($content); //parsing file content
            if (!$data) {
                return "Parsing failed";
            }
            $model = ModelFactory::produce($fileName); //the corresponding model
            $modelFields = $model->getFields(); 
            foreach ($data as $object) {   //rough verification of input data
                foreach ($object as $key => $value) {
                    if (!in_array($key, $modelFields)) {
                        return 'Data verification failed: undefined fields detected in file.';
                    }
                    if (count($object) < count($modelFields)) {
                        return 'Data verification failed: some unful entries detected in file.';
                    }
                }
            }
            foreach ($data as $object) {  //saving the objects
                $currentObj = ModelFactory::produce($fileName);
                foreach ($object as $key => $value) {
                    $method = 'set' . $key;
                    $currentObj->$method($value);
                }
                $save = $currentObj->save();
                if (!$save) {
                    return " Data import failed! Script stopped at ID: " . $currentObj->getId();
                }
            }
            return "Success!";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
