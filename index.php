<?php

require_once 'includes.php';

global $appPath;
if (!empty($_GET)) { /* web mode */
    $appPath = ".";
} else {
    /* console mode */
    $appPath = dirname(__FILE__);
}

$fileNames = array(); //the array of input filenames

if (isset($argv)) {
    $fileNames = $argv;
    array_shift($fileNames);
    
    if (empty($fileNames)) {
        echo "No files found in arguments!";
    } else {
        echo "\nOUTPUT RESULTS: \n=====================\n";
        foreach ($fileNames as $fileName) {
            echo Worker::Work($fileName) . "\nFOR: " . $fileName
            . "\n=====================\n";
        }
    }
} else {
    echo 'This is console application.';
}
    