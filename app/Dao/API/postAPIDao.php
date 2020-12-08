<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\PostAPIDaoInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostAPIDao implements PostAPIDaoInterface
{
    /**
     * post List
     * @return $postList
     */
    public function index()
    {
        return Post::with('user')->get();
    }

    /**
     * save Post
     * @param \App\Http\Controllers\API\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost($request)
    {
        $post = Post::create($request->only('title', 'description', 'create_user_id', 'updated_user_id'));
        return $post;
    }

    /**
     * show post detail
     * @param int $id
     */
    public function postDetail($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * edit post
     * @param int $id
     */
    public function editPost($request,$id)
    {
        $post = Post::find($id);
        $post -> update($request->only('title', 'description', 'create_user_id', 'updated_user_id'));
        return $post;
    }
}
