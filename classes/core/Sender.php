<?php

namespace core;

class Sender
{
    public function sendSignalOne()
    {
        $method = explode('::',__METHOD__)[1];
        \work\ConnectionManager::emit($method,'oio');
    }

    public function sendSignalTwo()
    {
        $method = explode('::',__METHOD__)[1];
        \work\ConnectionManager::emit($method,'oio');
    }

    public function sendSignalTree()
    {
        return 3;
    }

    public function emit()
    {

    }
}