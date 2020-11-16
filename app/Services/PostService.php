<?php

namespace App\Services;

use App\Contracts\Dao\PostDaoInterface;
use App\contracts\Services\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    /**
     * Class Constructor
     * @param OperatorPostDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * Get Post List
     * @param Object
     * @return $postList
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }
}
