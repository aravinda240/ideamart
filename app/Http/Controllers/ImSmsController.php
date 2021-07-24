<?php

namespace App\Http\Controllers;

use App\Exceptions\SMSServiceException;
use App\Utils\Lib;

class ImSmsController extends Controller
{
    public function __construct()
    {
    }

    public function processSMS($message, $addresses, $appData = [])
    {
        Lib::ApiLog(json_encode([
            'url' => 'processSMS',
            'type' => 'POST',
            'location' => 'Start of the code',
            'appData' => $appData,
            'request' => $addresses,
            'addressCount' => count($addresses)
        ]));

        if (count($addresses) > 0) {
            $appData['destinationAddresses'] = $addresses;
            $appData['message'] = $message;
            $this->sendSMS($appData);
        } else {
            throw new SMSServiceException('Format of the address is invalid.', 'E1325');
        }
    }

    private function sendSMS($arrayFields)
    {
        $apiResponse = Lib::curlCall(env('SMS_SENDER_URL'), $arrayFields);
        dd($apiResponse);
    }
}
