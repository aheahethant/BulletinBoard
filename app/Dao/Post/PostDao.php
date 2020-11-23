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
     * @return $postList
     */
    public function getPostList()
    {
        $posts = Post::all();
        return view('posts.post_list', compact('posts'));
    }

    /**
     * save post
     * @param \Illuminate\Http\Request $request
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
     * @param mixed $id
     */
    public function getPostById($id)
    {
        return Post::find($id);
    }

    /**
     * update post
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function updatePost($request, $id)
    {
        if ($request->status == 'checked') {
            $result = $request->status = 1;
        } else {
            $result = $request->status = 0;
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $result;
        $post->updated_user_id = Auth::user()->id;
        $post->save();
    }
    
    /**
     * delete post by id
     * @param \Illuminate\Http\Request $request
     */
    public function deletePostById($request)
    {
        Post::find($request->id)->delete();
    }
}
