<?php

namespace core;

interface SignalSlotInterface {

    /**
     * Подключение слота (handler) к сигналу (event).
     * @param \core\Obj $sender Отправитель
     * @param string $signal Сигнал (event) отправителя
     * @param \core\Obj $receiver Получатель
     * @param string $slot Слот (handler) получателя
     * @return bool
     * @throws \core\Exceptions\UnknownMethodException Если слот получателя не реализован
     * @throws \core\Exceptions\UnknownSignalException Если сигнал не объявлен и не реализован как слот
     */
    public static function connect(\core\Sender $sender,string $signal,\core\Receiver $receiver,string $slot) : bool;

    /**
     * Отключение слота (handler) от сигнала (event).
     * @param \core\Obj $sender Отправитель
     * @param string $signal Сигнал (event) отправителя
     * @param \core\Obj $receiver Получатель
     * @param string $slot Слот (handler) получателя
     * @return bool
     * @throws \core\Exceptions\UnknownSignalException Если сигнал не объявлен и не реализован как слот
     */
    public static function disconnect(\core\Sender $sender, string $signal, \core\Receiver $receiver, string $slot) : bool;

    /**
     * Отправка сигнала (event)
     * @param string $signal Отправляемый Сигнал (event)
     * @param mixed|null $args Параметры сигнала
     * @return bool TRUE в случае успешного выполнения всех подсоединенных слотов, FALSE в случае ошибки
     * @throws \core\Exceptions\InvalidParamException Если слот получателя не поддерживает параметры
     * @throws \core\Exceptions\UnknownSignalException Если сигнал не объявлен и не реализован как слот
     */
    public static function emit(string $signal, $args = null) : bool;
}