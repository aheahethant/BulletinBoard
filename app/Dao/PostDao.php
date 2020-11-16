<?php

namespace App\Dao;

use App\Contracts\Dao\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface
{
    /**
     * post List
     * @param Object
     * @return $postList
     */
    public function getPostList()
    {
        $posts = Post::all();
        return view('posts.post_list', compact('posts'));
    }
}
