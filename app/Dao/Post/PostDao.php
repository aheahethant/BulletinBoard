<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class PostDao implements PostDaoInterface
{
    /**
     * post List
     * @param Object
     * @return $postList
     */
    public function getPostList()
    {
        $posts = Post::all();
        return view('posts.post_list', compact('posts'));
    }

    /**
     * save post
     */
    public function savePost($request)
    {
        $post = new Post;
        $post->title = $request->confirm_title;
        $post->description = $request->confirm_description;
        $post->create_user_id = Auth::user()->id;
        $post->updated_user_id = Auth::user()->id;
        $post->save();
    }

    /**
     * get post id
     * @return postbyid
     */
    public function getPostById($id)
    {
        return Post::find($id);
    }

    /**
     * update post
     */
    public function updatePost($request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->updated_user_id = Auth::user()->id;
        $post->save();
    }
}
