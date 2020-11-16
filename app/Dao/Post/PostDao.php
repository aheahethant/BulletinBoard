<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
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
