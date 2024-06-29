<?php

spl_autoload_register(function ($class_name) {
   
    $directories = [
        './',
        
    ];

    // Loop through directories and look for the class file
    foreach ($directories as $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});