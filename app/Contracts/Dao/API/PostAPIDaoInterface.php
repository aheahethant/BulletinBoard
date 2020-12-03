<?php

namespace App\Contracts\Dao\API;

interface PostAPIDaoInterface
{
    /**
     * get the Post List
     * @return array postList
     */
    public function index();
}