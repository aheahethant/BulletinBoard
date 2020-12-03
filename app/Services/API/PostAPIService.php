<?php

namespace App\Services\API;

use App\Contracts\Dao\API\PostAPIDaoInterface;
use App\contracts\Services\API\PostAPIServiceInterface;

class PostAPIService implements PostAPIServiceInterface
{
    private $postAPIDao;

    /**
     * Class Constructor
     * @param OperatorPostAPIDaoInterface
     */
    public function __construct(PostAPIDaoInterface $postAPIDao)
    {
        $this->postAPIDao = $postAPIDao;
    }

    /**
     * Get Post List
     * @param Object
     * @return array $postList
     */
    public function index()
    {
        return $this->postAPIDao->index();
    }
}