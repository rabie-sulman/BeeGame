<?php
function autoload($class_name) {
    include 'Classes/'.$class_name . '.php';
}

spl_autoload_register('autoload');
