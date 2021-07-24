<?php

namespace App\Http\Controllers;

use App\App;
use App\ImApp;
use App\ImAppType;
use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $dashboardController;

    public function __construct(DashboardController $dashboardController)
    {
        $this->dashboardController = $dashboardController;
    }

    public function index()
    {
        if (\request()->wantsJson()) {
            return response()->json(App::get(), 200);
        }
        return view('app_management.index', ['apps' => Auth::user()->apps]);
    }

    public function viewApp($iId)
    {
        $app = App::where(['id' => $iId, 'user_id'=> Auth::user()->id])->first();
        if ($app) {
            return view('app_management.create_app', ['platforms' => Platform::get(), 'appDetails' => $app]);
        }

        return back()->withErrors(['Something went wrong. Please try again later.']);
    }

    public function delete($id) {
        if ($app = App::where(['id' => $id, 'user_id'=> Auth::user()->id])->first()) {
            $app->delete();
        }
        return redirect('app_management');
    }

//    public function addAppIdKey(Request $request)
//    {
//        $reqData = $request->all();
//        $ownedApps = [];
//
//        $this->addAppIdKeyValidator($request);
//
//        $dataArray = [
//            'app_id' => $reqData['app_id'],
//            'app_password' => $reqData['app_password']
//        ];
//        $appData = ImApp::where('rand_id', $reqData['rand_id'])->update($dataArray);
//
//        if ($appData) {
//            $ownedApps = $this->dashboardController->getOwnedApps();
//        }
//
//        return response()->json([
//            'success' => ($appData) ? true : false,
//            'appTblData' => view('app_management.inc.app_table', ['ownedApps' => $ownedApps])->render()
//        ]);
//    }

    public function addAppIdKeyValidator($request)
    {
        $rules = [
            'app_id' => 'required|min:10',
            'app_password' => 'required|min:32'
        ];

        $customMessages = [
            'app_id.required' => 'Application id is required.',
            'app_password.required' => 'Application key is required.',
            'app_id.min' => 'Application id should have minimum 10 characters.',
            'app_password.min' => 'Application key should have minimum 32 characters.'
        ];

        $this->validate($request, $rules, $customMessages);
    }

    public function createApp()
    {
        return view('app_management.create_app', ['platforms' => Platform::get(), 'appDetails' => null]);
    }

//    public function getAppTypes()
//    {
//        $appTypes = App::all()->toArray();
//        return $appTypes;
//    }

    public function storeApp(Request $request)
    {
        $validator = $this->validator($request->toArray());
        $reqArray = $request->toArray();

        if ($validator->fails()) {
            if ($reqArray['id']) {
                return redirect(('app_management/edit/' . $reqArray['id']))
                    ->withErrors($validator)
                    ->withInput();
            } else {
//                dd($validator);
                return redirect(('app_management/create'))
                    ->withErrors($validator)
                    ->withInput();
            }
        } else {
            if ($reqArray['id']) {
                $app = App::find($reqArray['id'])->first();
                $app->name = $reqArray['name'];
                $app->save();
                $app->platforms()->detach();
            } else {
                $app = new App();
                $app->name = $reqArray['name'];
                $app->user_id = Auth::user()->id;
                $app->save();
            }

            if ($app && isset($reqArray['platforms']) && is_array($reqArray['platforms']) && count($reqArray['platforms'])) foreach ($reqArray['platforms'] as $platformId) {
                $app->platforms()->attach($platformId, [
                    'sms_subscription_url' => $reqArray["{$platformId}_sms_subscription_url"],
                    'sms_default_sender_address' => $reqArray["{$platformId}_sms_default_sender_address"],
                    'sms_send_address_aliases' => $reqArray["{$platformId}_sms_send_address_aliases"],
                    'sms_short_code' => $reqArray["{$platformId}_sms_short_code"],
                    'sms_key_word' => $reqArray["{$platformId}_sms_key_word"],
                    'subscription_url' => $reqArray["{$platformId}_subscription_url"],
                    'subscription_app_id' => $reqArray["{$platformId}_subscription_app_id"],
                    'subscription_password' => $reqArray["{$platformId}_subscription_password"],
                    'initial_message' => $reqArray["{$platformId}_initial_message"],
                ]);
            }
            //dd($reqArray);
        }
//        Log::channel('apilog')->info('App Create Request', ['id' => $request->ip(), 'function' => 'storeApp', 'type' => 'POST', 'request' => $reqArray, 'response' => isset($response) ? $response : '']);
        return redirect('app_management');
//        dd($request->toArray());
    }

    public function genRandId()
    {
        $unique = Str::random(6);
        $check = ImApp::where('rand_id', $unique)->first();

        if ($check) {
            return $this->genRandId();
        }
        return $unique;
    }

    public function validator(array $data)
    {
        $rules = [
            'name' => 'required|max:10',
            'platforms' => 'required'
        ];
        $message = [
            'platform.required' => 'Platform is required.',
            'name.required' => 'Application name is required.',
            'name.max' => 'Application name exceeds the maximum length.',
        ];

        return Validator::make($data, $rules, $message);
    }

    public function deleteApp($iId)
    {

    }

//    public function validateFormData($aFormData)
//    {
//
//    }

}
