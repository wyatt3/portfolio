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

    public function getAdd() {
        return view('admin.updates.add');
    }

    public function postStore(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = new BlogPost([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        $post->save();
        return redirect()->route('updates.index')->with('message', 'Post Created Successfully');
    }

    public function getShow($id) {
        $post = BlogPost::find($id);
        return view('admin.updates.show', ['post' => $post]);
    }
    
    public function getEdit($id) {
        $post = BlogPost::find($id);
        return view('admin.updates.edit', ['post' => $post]);
    }

    public function postUpdate(Request $request) {
        $post = BlogPost::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('updates.index')->with('message', 'Post Successfully Updated!');
    }

    public function getDelete($id) {
        $post = BlogPost::find($id);
        $post->delete();
        return redirect()->route('updates.index')->with('message', 'Post Successfully Deleted!');
    }
}
