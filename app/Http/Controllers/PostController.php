<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @param postServiceInterface
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    /**
     * Show the Post List.
     *
     * @return postList
     */
    public function index()
    {
        return $this->postInterface->getPostList();
    }

    /**
     * save post 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost(Request $request)
    {
        $rules = [
            'confirm_title' => 'required|min:3|max:255',
            'confirm_description' => 'required|min:3|max:255',
            'status' => '',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->postInterface->savePost($request);
        return redirect()->route('post_list');
    }

    /**
     * get post id
     * @param mixed $id
     * @return view
     */
    public function getPostById($id)
    {
        $post = $this->postInterface->getPostById($id);
        return view('posts.update', compact('post'));
    }

    /**
     * update post
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePost(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->postInterface->updatePost($request, $id);
        return redirect()->route('post_list');
    }

    /**
     * delete post by id
     * @param \Illuminate\Http\Request $request
     */
    public function deletePostById(Request $request)
    {
        $this->postInterface->deletePostById($request);
        return redirect()->route('post_list');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importFile(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:xls,csv,xlsx,txt',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Excel::import(new PostImport, request()->file('file'));
            return redirect()->route('post_list');
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
