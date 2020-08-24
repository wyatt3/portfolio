<?php

namespace App\Http\Controllers;
use App\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function getIndex() {
        $posts = BlogPost::all();
        return view('admin.updates.home', ['posts' => $posts]);
    }

    public function getEdit($id) {
        
    }

    public function postUpdate(Request $request) {
        
    }

    public function getDelete($id) {
        $post = BlogPost::find($id);
        $post->delete();
        return redirect()->route('updates.index')->with('message', 'Post Deleted');
    }
}
