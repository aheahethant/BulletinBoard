<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    /**
     * get the Post List
     */
    public function getPostList();

    /**
     * save post
     * @param \Illuminate\Http\Request $request
     */
    public function savePost($request);
    
    /**
     * get post id
     * @param mixed $id
     */
    public function getPostById($id);
    
    /**
     * update post
     * @param Illuminate\Http\Request $request
     * @param mixed $id
     */
    public function updatePost($request, $id);
}
