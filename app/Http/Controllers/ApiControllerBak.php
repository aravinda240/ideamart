<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/29/2020
 * Time: 11:05 PM
 */

namespace App\Http\Controllers;

use App\ImApp;
use App\ImDailyReport;
use App\Utils\Lib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiControllerBak extends Controller
{
    private $password;
    protected $imSmsController;

    public function __construct(ImSmsController $imSmsController)
    {
//        $this->middleware('auth');
        $this->imSmsController = $imSmsController;
    }

    public function subscribeApp(Request $request)
    {
        $arrayReq = $request->all();

        if ($arrayReq['key']) {
            $ImApp = ImApp::where('rand_id', $arrayReq['key'])->get()->toArray();
            if (count($ImApp)) {
                $dataRequest = [
                    "applicationId" => $ImApp[0]['app_id'],
                    "password" => $ImApp[0]['app_password'],
                    "subscriberId" => "tel:94" . $arrayReq['subscriberId'],
                    "applicationMetaData" => [
                        "client" => 'MOBILEAPP',
                        "device" => "Samsung S10",
                        "os" => "android 8",
                        "appCode" => 'https://play.google.com/store/apps/details?id=lk',
                    ]
                ];

//        $dataRequest = [
//            "applicationId" => "APP_060095",
//            "password" => "28c595c10052bc3784fc1f126b763ba1",
//            "subscriberId" => "tel:94775510377",
//            "applicationMetaData" => []
//        ];


//                dd($dataRequest);
                $dataResp = Lib::curlCall(env('OTP_REQUEST_URL'), $dataRequest);
//                dd($dataResp);
                $subResp = [
                    'error' => false,
                    'data' => $dataResp,
                    'message' => 'Please enter OTP.'
                ];
            } else {
                $subResp = [
                    'error' => true,
                    'message' => 'We can\'t find the Application. Please try again later.'
                ];
            }
        } else {
            $subResp = [
                'error' => true,
                'message' => 'Something went wrong. Please try again later.'
            ];
        }


//        Log::channel('apilog')->info('Subs Notification API', ['function' => 'subscribeApp', 'type' => 'POST', 'request' => $dataRequest, 'response' => $response]);

        return $subResp;
    }

//    public function otpVerify()
//    {
//
//        $dataRequest = [
//            "applicationId" => "APP_060095",
//            "password" => "28c595c10052bc3784fc1f126b763ba1",
//            "referenceNo" => "9477551037716168685530611733920",
//            "otp" => "717117"
//        ];
//
//        $dataResp = Lib::curlCall(env('OTP_VERIFY_URL'), $dataRequest);
//        dd($dataResp);
//
//    }

    public function verifyOtp(Request $request)
    {
        $arrayReq = $request->all();

        if ($arrayReq['key']) {
            $ImApp = ImApp::where('rand_id', $arrayReq['key'])->get()->toArray();
            if (count($ImApp)) {
                $dataRequest = [
                    "applicationId" => $ImApp[0]['app_id'],
                    "password" => $ImApp[0]['app_password'],
                    "referenceNo" => $arrayReq['ref_no'],
                    "otp" => $arrayReq['otp'],
                ];

                $dataResp = Lib::curlCall(env('OTP_VERIFY_URL'), $dataRequest);
//                dd($dataResp);
                $subResp = [
                    'error' => false,
                    'data' => $dataResp,
                    'message' => 'Please enter OTP.'
                ];
            } else {
                $subResp = [
                    'error' => true,
                    'message' => 'We can\'t find the Application. Please try again later.'
                ];
            }
        } else {
            $subResp = [
                'error' => true,
                'message' => 'Something went wrong. Please try again later.'
            ];
        }
        return $subResp;
    }

    function checkStatus(Request $request)
    {
        $arrayReq = $request->all();

        if ($arrayReq['key']) {
            $ImApp = ImApp::where('rand_id', $arrayReq['key'])->get()->toArray();
            if (count($ImApp)) {
                $dataRequest = [
                    "applicationId" => $ImApp[0]['app_id'],
                    "password" => $ImApp[0]['app_password'],
                    "subscriberId" => "tel:" . $arrayReq['mobile_hash']
                ];

                $dataResp = Lib::curlCall(env('SUB_QUERY_URL'), $dataRequest);
                dd($dataResp);
                $subResp = [
                    'error' => false,
                    'data' => $dataResp,
                    'message' => 'Please enter OTP.'
                ];
            } else {
                $subResp = [
                    'error' => true,
                    'message' => 'We can\'t find the Application. Please try again later.'
                ];
            }
        } else {
            $subResp = [
                'error' => true,
                'message' => 'Something went wrong. Please try again later.'
            ];
        }


//        Log::channel('apilog')->info('Subs Notification API', ['function' => 'subscribeApp', 'type' => 'POST', 'request' => $dataRequest, 'response' => $response]);

        return $subResp;
    }

    public function imSms(Request $request)
    {
        Lib::ApiLog(json_encode([
            'url' => 'imSms',
            'type' => 'POST',
            'location' => 'Start of the code',
            'request' => $request,
        ]));
        dd($request);
        if (isset($request->applicationId, $request->frequency, $request->status, $request->subscriberId, $request->version, $request->timeStamp)) {


            if ($request->status == 'REGISTERED') {
                ImSubsController::RegUser($request->applicationId, $request->subscriberId);
            }
        }

        return 'ideamart SMS';
    }

    public function imUssd(Request $request)
    {
        return 'ideamart USSD';
    }

    public function imSubs(Request $request)
    {
        Lib::ApiLog(json_encode([
            'url' => 'imSubs',
            'type' => 'POST',
            'location' => 'Start of the code',
            'request' => $request,
        ]));

        $arrayReq = $request->toArray();
        $appData = ImApp::where('app_id', $arrayReq['applicationId'])->first();
//        dd($arrayReq, array($arrayReq['subscriberId']), $appData->toArray());

        $response = [
            "statusCode" => "S1000",
            "statusDetail" => "Success"
        ];

        if ($appData['id']) {
            $ImDailyReport = ImDailyReport::where('sub_number', $arrayReq['subscriberId'])->where('sub_status', 'sub')->where('im_app_id', $appData['id'])->first();
            if ($arrayReq['status'] === 'UNREGISTERED') {
                if ($ImDailyReport['id']) {
                    $ImDailyReport->sub_status = 'unsub';
                    $ImDailyReport->save();
                    $this->imSmsController->processSMS('Your are successfully unsubscribe. Thank you for using our service.', array('tel:' + $arrayReq['subscriberId']), ['password' => $appData['app_password'], 'applicationId' => $appData['app_id']]);

                } else {
                    $response = [
                        "statusCode" => "E1356",
                        "statusDetail" => "You are not subscribed with this service."
                    ];
                }
            } else {
                if ($ImDailyReport['id']) {
                    $response = [
                        "statusCode" => "E1351",
                        "statusDetail" => "You are already subscribed with this service"
                    ];
                } else {
                    $ImDailyReportNew = new ImDailyReport();
                    $ImDailyReportNew->im_app_id = $appData->id;
                    $ImDailyReportNew->sub_number = $arrayReq['subscriberId'];
                    $ImDailyReportNew->sub_status = 'sub';
                    $ImDailyReportNew->reg_status = ($arrayReq['status'] == 'REGISTERED') ? 'reg' : 'unreg';
                    $ImDailyReportNew->save();
                    $this->imSmsController->processSMS('Your are successfully subscribe. Thank you for subscribe.', array('tel:' + $arrayReq['subscriberId']), ['password' => $appData['app_password'], 'applicationId' => $appData['app_id']]);
                }
            }
        } else {
            $response = [
                "statusCode" => "E1301",
                "statusDetail" => "App ID not found. Please try again later."
            ];
        }

        Lib::ApiLog(json_encode([
            'url' => 'imSubs',
            'type' => 'POST',
            'body' => $arrayReq,
            'appData' => $appData,
            'error' => 'Subs Notification API',
            'response' => $response,
        ]));

//        Log::channel('apilog')->info('Subs Notification API', ['function' => 'imSubs', 'type' => 'POST', 'request' => $arrayReq, 'response' => $response]);

        return response()->json($response, 200);
    }

    public function getBaseSizeExternal(Request $request)
    {
        $arrayReq = $request->toArray();

        $url = env('SUB_BASE_URL');
        if ($arrayReq['app_id'] && $arrayReq['app_password']) {
            $reqBody = [
                "applicationId" => $arrayReq['app_id'],
                "password" => $arrayReq['app_password']
            ];
            $response = Lib::curlCall($url, $reqBody);
            if (isset($response->baseSize)) {
                return $response->baseSize;
            }
        }
        return '0';
    }

    public function msSms()
    {
        return 'mspace SMS';
    }

    public function msUssd()
    {
        return 'mspace USSD';
    }

    public function msSubs()
    {
        return 'mspace SUBS';
    }
}
