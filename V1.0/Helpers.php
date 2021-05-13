<?php

namespace App\Controller;

class Helpers
{
    public static function post($target, $customHeader = NULL, $postFields = [])
    {
        $curl = curl_init();
        $host = 'https://zapus.me/api/v1/';

        $header = [];

        $header[] = 'Connection: Keep-Alive';
        $header[] = 'Content-type: application/json';

        if (!empty($customHeader)) {
            $header = $customHeader;
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $host . $target,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING => "gzip, deflate, br",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postFields),
            CURLOPT_HTTPHEADER => $header,
        ));
        $response = curl_exec($curl);
        $response = json_decode($response, TRUE);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return json_encode(['success' => FALSE, 'response' => $err], TRUE);
        } else {
            return json_encode(['success' => TRUE, 'response' => $response], TRUE);
        }
    }

    public static function get($target)
    {
        $curl = curl_init();
        $host = 'https://zapus.me/api/v1/';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $host . $target,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_TIMEOUT => 30,
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, TRUE);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return json_encode(['success' => FALSE, 'response' => $err], TRUE);
        } else {
            return json_encode(['success' => TRUE, 'response' => $response], TRUE);
        }
    }

    public static function logs($file, $method, $log)
    {
        date_default_timezone_set('America/Sao_Paulo');

        if (!file_exists("./logs")){
            mkdir("./logs", 0777, true);
        }

        $msg = "|- START register ----------------------------------------------------------------- -|\n";
        $msg .= "dateTime: " . date('d/M/Y H:i:s') . "\n";
        $msg .= "method: " . $method . "\n";
        $msg .= "log: " . $log . "\n";
        $msg .= "|- END register ------------------------------------------------------------------- -|\n\n";

        $log_file_data = './logs/'.$file. '_' . date('d-m-Y') . '.log';
        file_put_contents($log_file_data, $msg, FILE_APPEND);
    }
}