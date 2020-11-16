<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\PostServiceInterface;
use App\Models\Post;

class PostController extends Controller
{

    private $postInterface;

    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    public function index()
    {
        return $this->postInterface->getPostList();
    }
}
