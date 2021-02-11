<?php

namespace core\Exceptions;

class UnknownMethodException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Неизвестный метод");
    }
}

