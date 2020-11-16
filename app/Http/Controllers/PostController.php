<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\PostServiceInterface;
use App\Models\Post;

class PostController extends Controller
{

    private $postInterface;

    /**
     * Create a new controller instance.
     *
     * @param postServiceInterface
     * @return void
     */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    /**
     * Show the Post List.
     *
     * @return postList
     */
    public function index()
    {
        return $this->postInterface->getPostList();
    }
}
