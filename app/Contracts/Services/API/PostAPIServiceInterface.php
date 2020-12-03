<?php

namespace App\Contracts\Services\API;

interface PostAPIServiceInterface
{
    /**
     * get the Post List
     * @return array postList
     */
    public function index();
}