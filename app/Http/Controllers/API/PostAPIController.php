<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\API\PostAPIServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

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
}
