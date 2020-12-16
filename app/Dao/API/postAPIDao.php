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
        $posts = Post::with('user')->get();
        return $posts;
    }

    /**
     * save Post
     * @param \App\Http\Controllers\API\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function savePost($request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'create_user_id' => 1,
            'updated_user_id' => 1
        ]);
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
        $post -> update([
            'title' => $request->title,
            'description' => $request->description,
            'create_user_id' => 1,
            'updated_user_id' => 2
        ]);
        return $post;
    }
    
    /**
     * delete post
     */
    public function destroy($id)
    {
        $post = Post::find($id);
 
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }
 
        if ($post->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post can not be deleted'
            ], 500);
        }
    }    
}
