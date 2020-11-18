<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    /**
     * get the Post List
     * @return array postList
     */
    public function getPostList();
    
    /**
     * save post
     * @param \Illuminate\Http\Request $request
     */
    public function savePost($request);
}
