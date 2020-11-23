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

    /**
     * get post id
     * @param mixed $id
     * @return array post
     */
    public function getPostById($id);

    /**
     * update post
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return array post
     */
    public function updatePost($request, $id);
    
    /**
     * delete post by id
     * @param \Illuminate\Http\Request $request
     */
    public function deletePostById($request);
}
