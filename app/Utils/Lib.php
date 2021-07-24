<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/19/2020
 * Time: 2:46 PM
 */

namespace App\Utils;


use Illuminate\Support\Facades\Auth;

class Lib
{

    private function sendRequest($jsonStream, $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStream);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        return self::handleResponse($res);
    }

    public static function curlCall($url, $arrayField = [])
    {

        $jsonObjectFields = json_encode($arrayField);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonObjectFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        self::ApiLog(json_encode([
            'url' => $url,
            'type' => 'POST',
            'body' => $arrayField,
            'code' => $http_status,
            'error' => $error,
            'request' => $jsonObjectFields,
            'response' => $res,
        ]));

        return self::handleResponse($res);
    }

    private static function handleResponse($resp)
    {
        if ($resp == "") {
            return 'Something went wrong. Please try again later.';
        } else {
            return $resp;
        }
    }

    public static function ApiLog($string, $strLogPath = '')
    {
        $strLogPath = base_path() . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . date('Ymd') . '.log';

        $user = Auth::user();
        error_log(date('Y-m-d H:i:s') . ',' . ($user ? $user->id : 0) . ',' . $string . PHP_EOL, 3, $strLogPath);
    }

    public static function curlCall2($url, $jsonStream)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return json_decode($response);
        }
    }

    public static function getPlatformByMsisdn($strMsisdn){
        $prefix = strpos($strMsisdn,0,2);
        if (in_array($prefix, ['71', '70'])) {
            return 'mspace';
        }
        return 'ideamart';
    }

//    private function handleResponse($resp)
//    {
//        if ($resp == "") {
//            return "";
//        } else {
//            return $resp;
//        }
//    }
}
