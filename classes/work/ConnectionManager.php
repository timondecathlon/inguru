<?php

namespace work;

class ConnectionManager implements \core\SignalSlotInterface
{

    private static $connections = [];

    public static  function connect(\core\Sender $sender,string $signal,\core\Receiver $receiver,string $slot) : bool
    {

        try {
            if (!method_exists($receiver, $slot)) {
                throw new \core\Exceptions\UnknownMethodException();
            }

            if (!isset($signal) || !method_exists($sender, $signal)) {
                throw new \core\Exceptions\UnknownSignalException();
            }

            //тут связываем сигнал отправителя с слотом получателя

            static::$connections[] = [
                'sender'=>$sender,
                'signal'=>$signal,
                'receiver'=>$receiver,
                'slot'=>$slot
            ];

            return true;

        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }


    }

    public static function disconnect(\core\Sender $sender,string $signal,\core\Receiver $receiver,string $slot) : bool
    {

        try {

            if (!isset($signal) || !method_exists($sender,$signal)) {
                throw new \core\Exceptions\UnknownSignalException();
            }

            //тут отвязываем сигнал отправителя от слота получателя
            for ($i=0; $i < count(static::$connections); $i++) {
                if (static::$connections[$i]['sender'] == $sender && static::$connections[$i]['signal'] == $signal && static::$connections[$i]['receiver'] == $receiver && static::$connections[$i]['slot'] == $slot ) {
                    array_splice(static::$connections,$i,1);
                }
            }

            return true;

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public static function emit(string $signal, $args = null) : bool
    {

        try {

            for ($i=0; $i < count(static::$connections); $i++) {
                if (static::$connections[$i]['signal'] == $signal) {

                    if (!isset($signal) || !method_exists(static::$connections[$i]['sender'],$signal)) {
                        throw new \core\Exceptions\UnknownSignalException();
                    }

                    try {
                        static::$connections[$i]['receiver']->{static::$connections[$i]['slot']}($args);
                    } catch (\TypeError $e) {
                        throw new \core\Exceptions\InvalidParamException();
                    }

                }
            }
            return true;

        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }


    }
}