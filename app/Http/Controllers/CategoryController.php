<?php

namespace App\Http\Controllers;

use App\Category;
use App\Utils\Lib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewCategories($id = 0)
    {
        return view('category_management/categories', ['categories' => Category::get(),'apps' => Auth::user()->apps, 'catData' => ($id ? Category::find($id) : null)]);
    }

    public function addCategory(Request $request)
    {
        $this->categoryValidator($request);
        $reqData = $request->all();
        $msgType = 'success';
        $dataArray = [
            'name' => $reqData['catName'],
            'status' => $reqData['catStatus']
        ];
        if ($reqData['catId']) {
            if ($category = Category::find($reqData['catId'])) {
                $category->update($dataArray);
                if ($category && isset($reqData['apps']) && is_array($reqData['apps']) && count($reqData['apps'])){
                    $category->apps()->sync($reqData['apps']);
                }
                $resMsg = 'Category updated successfully.';
            } else {
                $resMsg = 'Invalid Category Id.';
            }

        } else {
            $category = Category::create($dataArray);

            if ($category && isset($reqData['apps']) && is_array($reqData['apps']) && count($reqData['apps'])) foreach ($reqData['apps'] as $appId) {
                $category->apps()->attach($appId);
            }
            $resMsg = 'Category added successfully.';
        }
        return redirect()->back()->with($msgType, $resMsg);
    }

    public function deleteCategory($id) {
        if ($category = Category::find($id)) {
            $category->delete();
        }
        return redirect('category_management');
    }

    public function categoryValidator($request)
    {
        $rules = [
            'catName' => 'required|min:4',
            'catStatus' => 'required'
        ];

        $customMessages = [
            'catName.required' => 'Category name is required.',
            'catName.min' => 'Category name should have minimum 4 characters.',
            'catStatus.required' => 'Category status is required.'
        ];

        $this->validate($request, $rules, $customMessages);
    }




























/*


    public function viewContents()
    {
        return view('category_management/contents', ['ownedApps' => $this->dashboardController->getOwnedApps()]);
    }

    public function filterCategory($iId = 0)
    {
//        $filterCategories = ImCategory::with('imApp')->where('im_app_id', $iId)->get()->toArray();
        $filterCategories = ImCategory::where('im_app_id', $iId)->get()->toArray();
        return response()->json([
            'success' => ($filterCategories) ? true : false,
            'catTblData' => view('category_management/cat_tbl_container', ['filterCategories' => $filterCategories])->render()
        ]);
    }

    public function filterContent($iId = 0)
    {
        $catHtml = '';
        $filterContents = ImCategory::where('im_app_id', $iId)->get();
        $contentTblData = ImContent::with('imCategory')->whereIn('im_category_id', $filterContents->pluck('id')->toArray())->get()->toArray();

        foreach ($filterContents as $filterContent) {
            $catHtml .= "<option value='{$filterContent['id']}'>{$filterContent['name']}</option>";
        }
        return response()->json([
            'success' => ($filterContents) ? true : false,
            'catDropDown' => $catHtml,
            'contentTblData' => view('category_management/content_tbl_container', ['filterContents' => $contentTblData])->render()
        ]);
    }

    public function getCategory($iId = 0)
    {
        $category = Category::find($iId);
        return response()->json([
            'success' => ($category) ? true : false,
            'catFormData' => view('category_management/inc/cat_form_part', ['catData' => $category, 'apps' => Auth::user()->apps])->render()
        ]);
    }



    public function addContent(Request $request)
    {
        $this->contentValidator($request);
        $reqData = $request->all();
        $appData = ImApp::find($reqData['contentAppId'])->toArray();

        $dataArray = [
            'im_category_id' => $reqData['contentCatId'],
            'details' => $reqData['content']
        ];

        $resData = ImContent::create($dataArray);

        if ($resData) {
            $addresses = $this->makeSmsObj($reqData['contentAppId']);
//            $this->imSmsController->processSMS($reqData['content'], $addresses, ['password' => $appData['app_password'], 'applicationId' => $appData['app_id']]);
//            $this->sms($reqData['content'], $addresses, ['password' => $appData['app_password'], 'applicationId' => $appData['app_id']]);
            $this->sms($reqData['content'], $addresses, $appData['app_password'], $appData['app_id']);
            $resMsg = 'Category added successfully.';
            $msgType = 'success';
        } else {
            $resMsg = 'Something went wrong. Please try again later.';
            $msgType = 'error';
        }

        return redirect()->back()->with($msgType, $resMsg);
    }

    private function makeSmsObj($imAppId)
    {
        $response = ImDailyReport::with('imApp')->where('im_app_id', $imAppId)->where('sub_status', 'sub')->get()->toArray();
        return array_map(function ($var) {
            return 'tel:' . $var['sub_number'];
        }, $response);
    }

    public function sms($message, $addresses, $password, $applicationId)
    {

//        dd($message, $addresses, $password, $applicationId);
        if (is_array($addresses)) {
            return $this->smsMany($message, $addresses, $password, $applicationId);
        } else if (is_string($addresses) && trim($addresses) != "") {
            return $this->smsMany($message, array($addresses), $password, $applicationId);
        } else {
            throw new Exception("Address should a string or a array of strings");
        }
    }

    private function smsMany($message, $addresses, $password, $applicationId)
    {
        $arrayField = array(
            "applicationId" => $applicationId,
            "password" => $password,
            "message" => $message,
            "deliveryStatusRequest" => 1,
            "destinationAddresses" => $addresses);

//        dd($arrayField);
//        $jsonObjectFields = json_encode($arrayField);
        $apiResponse = Lib::curlCall(env('SMS_SENDER_URL'), $arrayField);
        dd($apiResponse);
        return $apiResponse;
//        return $this->sendRequest($arrayField);
    }

    public function categoryValidator($request)
    {
        $rules = [
            'catName' => 'required|min:4',
            'catStatus' => 'required'
        ];

        $customMessages = [
            'catName.required' => 'Category name is required.',
            'catName.min' => 'Category name should have minimum 4 characters.',
            'catStatus.required' => 'Category status is required.'
        ];

        $this->validate($request, $rules, $customMessages);
    }

    public function contentValidator($request)
    {
        $rules = [
            'contentAppId' => 'required',
            'contentCatId' => 'required',
            'content' => 'required|min:20'
        ];

        $customMessages = [
            'contentAppId.required' => 'Application is required.',
            'contentCatId.required' => 'Category is required.',
            'content.required' => 'Content is required.',
            'content.min' => 'Category name should have minimum 20 characters.'
        ];

        $this->validate($request, $rules, $customMessages);
    }
*/
}
