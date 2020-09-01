<?php
namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller {
    public function postCreatePost(Request $request) {
        // validation
        $this->validate($request, [
           'body' => 'required|max:1000'
        ]);

        $post = new Posts();
        $post->body = $request['body'];
        $message = 'There was an error';
        if($request->user()->posts()->save($post)) {
            $message ='Post successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]);

    }
}
