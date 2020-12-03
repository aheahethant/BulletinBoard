<?php

namespace App\Http\Controllers\API;

use App\Contracts\Services\API\PostAPIServiceInterface;
use App\Http\Controllers\Controller;

class PostAPIController extends Controller
{
    private $postAPIInterface;

    /**
     * Create a new controller instance.
     *
     * @param postAPIServiceInterface
     * @return void
     */
    public function __construct(PostAPIServiceInterface $postAPIInterface)
    {
        $this->postAPIInterface = $postAPIInterface;
    }

    /**
     * Show the Post List.
     *
     * @return postList
     */
    public function index()
    {
        return $this->postAPIInterface->index();
    }
}
