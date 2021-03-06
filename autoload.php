<?php
    //refer to http://justericgg.logdown.com/posts/196891-php-series-autoload;

    spl_autoload_register(function ($className){

        $className = ltrim($className, "\\");   //remove the leftest symbol '\'
        $fileName = ""; //create empty storage for filename to include
        $namespace = "";

        if($lastPos = strrpos($className, "\\")){    //find possition of '\'
            $namespace = substr($className, 0, $lastPos);
            $className = substr($className, $lastPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require $fileName;
    });


    function url($fileName){
        $fileName = ltrim($fileName, '/');
        $url = "http://" . $_SERVER["HTTP_HOST"] . "/" . $fileName;
        return $url;
    }

    function path($fileName){
        $fileName = ltrim($fileName, '/');
        $path = __DIR__ . "/" . $fileName;
        return $path;
    }