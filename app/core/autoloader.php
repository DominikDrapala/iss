<?php

function __autoload($classname) {
    $path = BASEPATH . '/app/' . str_replace('\\', '/', $classname). '.php';

    if (file_exists($path)) {

        require_once $path;
        return true;
    } else {
        return false;
    }
}