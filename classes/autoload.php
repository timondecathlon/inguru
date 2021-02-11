<?php

function classLoader($class)
{
    require_once('classes/' . str_replace('\\', '/', $class . '.php'));
}

spl_autoload_register('classLoader');


