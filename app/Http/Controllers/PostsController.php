<?php
namespace App\Http\Controllers;


use App\Like;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller {
    public function getDashBoard() {
        $posts = Posts::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

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

    public function getDeletePost($post_id) {
        $post = Posts::where('id', $post_id)->first();
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }

    public function postEditPost(Request $request) {
        $this->validate($request, [
           'body'=> 'required',
        ]);
        $post = Posts::find($request['postId']);
        if(Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Posts::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user['id'];
        $like->post_id = $post['id'];
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }


}
