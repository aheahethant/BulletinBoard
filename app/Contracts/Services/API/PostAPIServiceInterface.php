<?php

namespace App\Contracts\Services\API;

interface PostAPIServiceInterface
{
    /**
     * get the Post List
     * @return array postList
     */
    public function index();

    /**
     * save Post
     * @param \App\Http\Controllers\API\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost($request);
    
    /**
     * show post detail
     * @param int $id
     */
    public function postDetail($id);
    
    /**
     * edit post
     * @param \App\Http\Controllers\API\Request $request
     * @param int $id
     * @return post by $id
     */
    public function editPost($request,$id);
}