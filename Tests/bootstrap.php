<?php

spl_autoload_register(function ($class) {
    if (0 === strpos(ltrim($class, '/'), 'Publero\Component\CodeGenerator')) {
        if (file_exists($file = __DIR__.'/../'.substr(str_replace('\\', '/', $class), strlen('Publero\Component\CodeGenerator')).'.php')) {
            require_once $file;
        }
    }
});
