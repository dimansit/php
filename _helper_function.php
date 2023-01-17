<?php

/**
 * Метод короткого вывада данных для отладки
 * 
 * @param mixed $inData
 * @return void
 */
function pr($inData):void
{
    echo "<pre>";
    print_r($inData);
    echo "</pre>";
}

