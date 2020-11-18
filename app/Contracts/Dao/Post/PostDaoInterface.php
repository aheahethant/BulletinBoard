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
     */
    public function savePost($request);
    
    /**
     * get post id
     */
    public function getPostById($id);
    
    /**
     * update post
     */
    public function updatePost($request, $id);
}