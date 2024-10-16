<?php
namespace Model\Services;

use Model\Services\ResponseManager;

class Manager
{
    public static function ReturnTime($request, $response)
    {
        $func = function ()
        {
            date_default_timezone_set('Etc/GMT' . GMT);
            $time = date('Y-m-d H:i:s');
            return $time;
        };

        return ResponseManager::ReturnSSEResponse($request, $response, $func, 1);
    }

    public static function ReturnSaraza($request, $response)
    {
        $text = 'Saraza';
        $func = function() use ($text)
        {
            return $text;
        };

        return ResponseManager::ReturnSSEResponse($request, $response, $func, 1);
    }
}

?>
