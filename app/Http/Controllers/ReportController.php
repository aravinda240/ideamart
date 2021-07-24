<?php

namespace App\Http\Controllers;

use App\ImApp;
use App\ImDailyReport;
use App\Utils\Lib;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewCommonReport()
    {
//        $appDetails = ImApp::all()->toArray();
        $appDetails = Auth::user()->imApps()->get()->toArray();
        $newArray = [];
        foreach ($appDetails as $key => $appDetail) {
            $newArray[$key] = $appDetail;
            $baseSize = (int)$this->getBaseSize($appDetail);
            $newArray[$key]['baseSize'] = $baseSize;
            $subCount = $this->totalSub($appDetail);
            $newArray[$key]['totalActive'] = $subCount['active'];
            $newArray[$key]['totalInactive'] = $subCount['inactive'];
            $newArray[$key]['pending'] = $subCount['active'] - $baseSize;
        }
//        dd($newArray);
        return view('report_management.common_report', ['appsData' => $newArray]);
    }

    public function totalSub($appDetail)
    {
        $activeSub = ImDailyReport::where('im_app_id', $appDetail['id'])->where('sub_status', 'sub')->get();
        $inactiveSub = ImDailyReport::where('im_app_id', $appDetail['id'])->where('sub_status', 'unsub')->get();
        $activeSubCount = count($activeSub->toArray());
        $inactiveSubCount = count($inactiveSub->toArray());
        return $subCount = ['active' => $activeSubCount, 'inactive' => $inactiveSubCount];
    }

    public function getBaseSize($appDetail)
    {
//        $url = env('SUB_BASE_URL');
        $url = 'https://api.ideamart.io/subscription/query-base';
        if ($appDetail['app_id'] && $appDetail['app_password']) {
            $reqBody = [
                "applicationId" => $appDetail['app_id'],
                "password" => $appDetail['app_password']
            ];
            $response = Lib::curlCall($url, $reqBody);
            $response = json_decode($response);
            if (isset($response->baseSize)) {
                return $response->baseSize;
            }
        }
        return '0';
    }

    public function viewDailyReport($appId)
    {
        $reportData = $this->getReportData($appId, Carbon::now()->firstOfMonth()->toDateString(), Carbon::now()->addDays(1)->toDateString());

        return view('report_management.daily_report', ['reportData' => $reportData['tableData'], 'footerData' => $reportData['tableFooterData'], 'appId' => $appId]);
    }

    public function filterDailyReport($appId, $fData, $tDate)
    {
        $reportData = $this->getReportData($appId, $fData, $tDate);

        return view('report_management.daily_report_table', ['reportData' => $reportData['tableData'], 'footerData' => $reportData['tableFooterData']])->render();
    }

    public function getReportData($appId, $fData, $tDate)
    {
//        dd($appId, $fData, $tDate);
        $appExist = ImApp::where('rand_id', $appId)->get();

        if (count($appExist)) {
            $tableData = DB::select('SELECT DATE_FORMAT(idr.created_at, "%Y-%m-%d") as report_date, 
                                           SUM( CASE WHEN sub_status = "sub" THEN 1 ELSE 0 END ) AS sub_count, 
                                           SUM( CASE WHEN sub_status = "unsub" THEN 1 ELSE 0 END ) AS unsub_count, 
                                           SUM( CASE WHEN reg_status = "reg" THEN 1 ELSE 0 END ) AS reg_count, 
                                           SUM( CASE WHEN reg_status = "unreg" THEN 1 ELSE 0 END ) AS unreg_count 
                                          FROM im_daily_reports idr, im_apps iap
                                         WHERE iap.id = idr.im_app_id
                                           AND iap.rand_id = :app_rand
                                           AND idr.created_at BETWEEN DATE_FORMAT(:from_date, "%Y-%m-%d") AND DATE_FORMAT(:to_date, "%Y-%m-%d")
                                      GROUP BY DATE_FORMAT(idr.created_at, "%Y-%m-%d")', ['app_rand' => $appId, 'from_date' => $fData, 'to_date' => $tDate]);

            $tableFooterData = DB::select('SELECT iap.id, 
                                           SUM( CASE WHEN sub_status = "sub" THEN 1 ELSE 0 END ) AS total_sub, 
                                           SUM( CASE WHEN sub_status = "unsub" THEN 1 ELSE 0 END ) AS total_unsub, 
                                           SUM( CASE WHEN reg_status = "reg" THEN 1 ELSE 0 END ) AS total_reg, 
                                           SUM( CASE WHEN reg_status = "unreg" THEN 1 ELSE 0 END ) AS total_unreg 
                                          FROM im_daily_reports idr, im_apps iap
                                         WHERE iap.id = idr.im_app_id
                                           AND iap.rand_id = :app_rand
                                           AND idr.created_at BETWEEN DATE_FORMAT(:from_date, "%Y-%m-%d") AND DATE_FORMAT(:to_date, "%Y-%m-%d")
                                      GROUP BY iap.id', ['app_rand' => $appId, 'from_date' => $fData, 'to_date' => $tDate]);
        } else {
//            abort(404);
            abort(500);
        }

        $reportData = ['tableData' => $tableData,
            'tableFooterData' => $tableFooterData];
        return $reportData;
    }
}
