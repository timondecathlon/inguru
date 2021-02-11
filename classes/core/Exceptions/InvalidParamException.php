<?php

namespace core\Exceptions;

class InvalidParamException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Неверный парметр");
    }
}
