<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\API\PostAPIServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostImport;
use App\Models\Post;

class PostAPIController extends Controller
{
    private $postAPIInterface;

    /**
     * Create a new controller instance.
     *
     * @param postAPIServiceInterface
     * @return void
     */
    public function __construct(PostAPIServiceInterface $postAPIInterface)
    {
        $this->postAPIInterface = $postAPIInterface;
        // $this->middleware('auth:api');
    }

    /**
     * Show the Post List.
     *
     * @return postList
     */
    public function index()
    {
        return $this->postAPIInterface->index();
    }

    /**
     * save post
     * @param \App\Http\Controllers\API\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost(Request $request)
    {
        return $this->postAPIInterface->savePost($request);
    }

    /**
     * show post detail
     * @param int $id
     */
    public function postDetail($id)
    {
        return $this->postAPIInterface->postDetail($id);
    }

    /**
     * edit post
     * @param int $id
     */
    public function editPost(Request $request,$id)
    {
        return $this->postAPIInterface->editPost($request, $id);
    }
    
    /**
     * post delete
     * @param int $id
     */
    public function destroy($id)
    {
        return $this->postAPIInterface->destroy($id);
    }
    
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importFile(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:csv,txt',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $file = $request->file->path();
        if(($handle = fopen($file, 'r')) !== FALSE){
            $header_column = fgetcsv($handle, 0, ',');
            if(count($header_column)>2){
                return redirect()->back()->with('fail', 'Header columns only have title & description');
            }
        }
        try {
            Excel::import(new PostImport, request()->file('file'));
            return Post::get();
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
            return back()->withErrors($failures)->withInput();
        }
    }
}
