<?php

namespace App\Services;

use App\Contracts\Dao\PostDaoInterface;
use App\contracts\Services\PostServiceInterface;

class PostService implements PostServiceInterface
{
    private $postDao;

    public function __construct(PostDaoInterface $postDao) {
        $this->postDao = $postDao;
    }

    public function getPostList()
    {
        return $this->postDao->getPostList();
    }
}
