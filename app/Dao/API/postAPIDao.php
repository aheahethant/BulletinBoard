<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\PostAPIDaoInterface;
use App\Models\Post;

class PostAPIDao implements PostAPIDaoInterface
{
    /**
     * post List
     * @return $postList
     */
    public function index()
    {
        return Post::all();
    }
}