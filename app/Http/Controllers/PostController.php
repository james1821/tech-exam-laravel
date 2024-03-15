<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
    
        }
        return redirect('/');
      
    }
    
    public function createPost(Request $request){
        $PostData = $request->validate(
            [
                'title' => 'required',
                'body' => 'required'
            ]
            );
            $PostData['title'] = strip_tags($PostData['title']);
            $PostData['body'] = strip_tags($PostData['body']);
            $PostData['user_id'] = auth()->id();
            Post::create($PostData);
            return redirect('/');
    }

    public function editPost(Post $post){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
            return view('edit-post',['post'=>$post]);
    }

    public function updatePost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
             $UpdatedData = $request->validate(
            [
                'title' => 'required',
                'body' => 'required'
            ]
            );
            $UpdatedData['title'] = strip_tags($UpdatedData['title']);
            $UpdatedData['body'] = strip_tags($UpdatedData['body']);
           $post->update($UpdatedData);
            return redirect('/');
}


}
