<?php

namespace core\Exceptions;

class UnknownSignalException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Неизвестный сигнал");
    }
}