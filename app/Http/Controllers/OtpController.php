<?php

namespace App\Http\Controllers;

use App\ImOtpKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    public function __construct(DashboardController $dashboardController)
    {
        $this->middleware('auth');
        $this->dashboardController = $dashboardController;
    }

    public function index()
    {
        $appData = Auth::user()->imApps()->get()->toArray();
        $ideamartApps = [];
        $mspaceApps = [];
        foreach ($appData as $app) {
            if ($app['platform'] == 'mspace') {
                array_push($mspaceApps, $app);
            } else {
                array_push($ideamartApps, $app);
            }
        }

        return view('otpApiKey', ['ideamartApps' => $ideamartApps, 'mspaceApps' => $mspaceApps, 'commonDataTbl' => Auth::user()->imOtpKeys()->with('imApps')->get()->toArray()]);
    }

    public function generateKey(Request $request)
    {
        $this->keyValidator($request);
        $reqData = $request->all();
        unset($reqData['_token']);
        $commonKey = $this->genRandKey();
        $resData = false;

        foreach (array_values($reqData) as $data) {
            $otpKey = new ImOtpKey();
            $otpKey->im_app_id = $data;
            $otpKey->user_id = Auth::user()->id;
            $otpKey->mapped_key = $commonKey;
            $resData = $otpKey->save();
        }

        if ($resData) {
            $resMsg = 'Common key generated successfully.';
            $msgType = 'success';
        } else {
            $resMsg = 'Something went wrong. Please try again later.';
            $msgType = 'error';
        }

        return redirect()->back()->with($msgType, $resMsg);
    }

    public function genRandKey()
    {
        $unique = Str::random(30);
        $check = ImOtpKey::where('mapped_key', $unique)->first();

        if ($check) {
            return $this->genRandId();
        }
        return $unique;
    }

    public function keyValidator($request)
    {
        $rules = [
            'ideamartAppId' => 'required',
            'mspaceAppId' => 'required'
        ];

        $customMessages = [
            'ideamartAppId.required' => 'ideamart app is required.',
            'mspaceAppId.required' => 'mSpace app is required.'
        ];

        $this->validate($request, $rules, $customMessages);
    }
}
