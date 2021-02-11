<?php

namespace core;

class Receiver
{
    public function actionOnSignalOne(int $par = null)
    {
        echo 'реакция на первый сигнал';
    }

    public function actionOnSignalTwo()
    {
        echo 'реакция на второй сигнал';
    }

    public function actionOnSignalThree()
    {
        echo 'реакция на третий сигнал';
    }
}