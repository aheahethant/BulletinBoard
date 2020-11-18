<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    /**
     * Class Constructor
     * @param OperatorPostDaoInterface
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Get Post List
     * @param Object
     * @return array $postList
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }

    /**
     * save post
     * 
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function savePost($request)
    {
        $this->postDao->savePost($request);
    }
}
