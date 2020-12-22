<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\PostUploadFileRequest;
use App\Imports\PostImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\PseudoTypes\False_;

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
    public function savePost(PostCreateRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $this->postInterface->savePost($validated);
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
    public function updatePost(PostUpdateRequest $request, $id)
    {
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
    public function importFile(PostUploadFileRequest $request)
    {
        $file = $request['file']->path();
        if (($handle = fopen($file, 'r')) !== false) {
            $header_column = fgetcsv($handle, 0, ',');
            if (count($header_column)>2) {
                return redirect()->back()->with('fail', 'Header columns only have title & description');
            }
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
