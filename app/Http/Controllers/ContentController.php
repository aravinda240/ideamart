<?php


namespace App\Http\Controllers;


use App\Category;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Context;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($id = 0)
    {
        return view('content_management/contents', ['contents' => Content::get(),'categories' => Category::get(), 'content' => ($id ? Content::find($id) : null)]);
    }

    public function add(Request $request)
    {
        $this->contentValidator($request);
        $reqData = $request->all();
        $msgType = 'success';
        $dataArray = [
            'content' => $reqData['content'],
            'feature' => (isset($reqData['feature']) && $reqData['feature'] == 'on') ? '1' : '0'
        ];
        if ($reqData['contentId']) {
            if ($content = Content::find($reqData['contentId'])) {
                $content->update($dataArray);
                if ($content && isset($reqData['categoryIds']) && is_array($reqData['categoryIds']) && count($reqData['categoryIds'])){
                    $content->categories()->sync($reqData['categoryIds']);
                }
                $resMsg = 'Content updated successfully.';
            } else {
                $resMsg = 'Invalid Category Id.';
            }

        } else {
            $content = Content::create($dataArray);

            if ($content && isset($reqData['categoryIds']) && is_array($reqData['categoryIds']) && count($reqData['categoryIds'])) foreach ($reqData['categoryIds'] as $categoryId) {
                $content->categories()->attach($categoryId);
            }
            $resMsg = 'Content added successfully.';
        }
        return redirect()->back()->with($msgType, $resMsg);
    }

    public function delete($id) {
        if ($content = Content::find($id)) {
            $content->delete();
        }
        return redirect('content_management');
    }

    public function contentValidator($request)
    {
        $rules = [
            'content' => 'required'
        ];

        $customMessages = [
            'content.required' => 'Content name is required.',
        ];

        $this->validate($request, $rules, $customMessages);
    }
}
