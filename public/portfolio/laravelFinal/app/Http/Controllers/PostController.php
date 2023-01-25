<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Auth;

class PostController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function getPost($id) {
        $post = Post::find($id);
        $user = User::find($post->user_id);
        return view('posts.post', ['post' => $post, 'user' => $user]);
    }


    //Admin Functions

    public function getAdminIndex() {
        $user = Auth::user();
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.index', ['posts' => $posts, 'user' => $user]);
    }

   public function getAdminCreate() {
       return view('admin.create');
   }

   public function postAdminCreate(Request $request) {
       if($request->input('public')) {
           $public = 1;
       } else {
           $public = 0;
       }
        $this->validate($request, [
            'make' => 'required|max:25',
            'model' => 'required|max:25',
            'year' => 'required|numeric'
        ]);
        $user = Auth::user();
        $title = $request->input('year') . ' ' . $request->input('make') . ' ' . $request->input('model');
        $post = new Post([
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'title' => $title,
            'trim' => $request->input('trim'),
            'description' => $request->input('description'),
            'public' => $public,
        ]);
        $user->posts()->save($post);
        return redirect()->route('admin.index')->with('info', 'Post Created: ' . $title);
   }

   public function getAdminEdit($id) {
       $post = Post::find($id);
       if($post->public == 0) {
            if($post->user_id != Auth::user()->id) {
                    return redirect()->back();
            }
        }
       return view('admin.edit', ['post' => $post]);
   }

   public function postAdminUpdate(Request $request) {
        if($request->input('public')) {
            $public = 1;
        } else {
            $public = 0;
        }
       $this->validate($request, [
           'make' => 'required|max:25',
           'model' => 'required|max:25',
           'year' => 'required|numeric'
       ]);
       $post = Post::find($request->input('id'));
       $post->make = $request->input('make');
       $post->model = $request->input('model');
       $post->year = $request->input('year');
       $title = $post->year . ' ' . $post->make . ' ' . $post->model;
       $post->title = $title;
       $post->trim = $request->input('trim');
       $post->description = $request->input('description');
       $post->public = $public;
       $post->save();
       return redirect()->route('admin.index')->with('info', 'Post Edited: ' . $title);

   }

   public function getAdminDelete($id) {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post deleted.');
   }

   public function getCloseAccount() {
       return view('admin.close_account');
   }

   public function postCloseAccount() {
       $user = Auth::user();
       Post::where('user_id', $user->id)->delete();
       $user->delete();
       return redirect()->route('posts.index')->with('info', 'Account Closed. Posts deleted.');
   }
}
