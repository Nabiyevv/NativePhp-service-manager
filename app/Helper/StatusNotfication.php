<?php


namespace App\Helper;

use Native\Laravel\Facades\Notification;
use Override;

class StatusNotfication {

    public static function send(string $serviceName = null, string $type = null,bool $isFavorite = false)
    {
        if($type == 'start')
        {
            $title = "Service Started Successfully";
            $message = $serviceName . " Service Started Successfully";
        }
        elseif($type == 'stop')
        {
            $title = "Service Stopped Successfully";
            $message = $serviceName . " Service Stopped Successfully";
        }
        elseif($type == 'restart')
        {
            $title = "Service Restarted Successfully";
            $message = $serviceName . " Service Restarted Successfully";
        }
        else
        {
            if($isFavorite)
            {
                $title = "Service Added To Favorite";
                $message = $serviceName . " Service Added To Favorite";
            }
            else
            {
                $title = "Service Removed From Favorite";
                $message = $serviceName . " Service Removed From Favorite";
            }
        }
        Notification::title($title)
        ->message($message)
        ->show();
    }

}