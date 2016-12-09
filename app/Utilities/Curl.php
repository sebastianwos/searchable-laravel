<?php
/**
 * Created by PhpStorm.
 * User: JS-BOG
 * Date: 2016-08-22
 * Time: 22:25
 */

namespace App\Utilities;


class Curl
{

    public function post($url, $payload)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
    
}