<?php
namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller {
    public function postCreatePost(Request $request) {
        // validation
        $post = new Posts();
        $post->body = $request['body'];
        $request->user()->posts()->save($post);

        return redirect()->route('dashboard');

    }
}
