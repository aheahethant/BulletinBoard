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

    /**
     * save Post
     * @param \App\Http\Controllers\API\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost($request)
    {
        return $this->postAPIDao->savePost($request);
    }
    
    /**
     * show post detail
     * @param int $id
     */
    public function postDetail($id)
    {
        return $this->postAPIDao->postDetail($id);
    }
    
    /**
     * edit post
     * @param \App\Http\Controllers\API\Request $request
     * @param int $id
     * @return post by $id
     */
    public function editPost($request,$id)
    {
        return $this->postAPIDao->editPost($request, $id);
    }
    
    /**
     * post delete
     * @param int $id
     */
    public function destroy($id)
    {
        return $this->postAPIDao->destroy($id);
    }
}