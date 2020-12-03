<?php

namespace App\Services\API;

use App\Contracts\Dao\API\UserAPIDaoInterface;
use App\contracts\Services\API\UserAPIServiceInterface;

class UserAPIService implements UserAPIServiceInterface
{
    private $userAPIDao;

    /**
     * Class Constructor
     * @param \App\Contracts\Dao\API\UserAPIDaoInterface $userAPIDao
     */
    public function __construct(UserAPIDaoInterface $userAPIDao)
    {
        $this->userAPIDao = $userAPIDao;
    }

    /**
     * Get user List
     * @param Object
     * @return array $userList
     */
    public function index()
    {
        return $this->userAPIDao->index();
    }
}