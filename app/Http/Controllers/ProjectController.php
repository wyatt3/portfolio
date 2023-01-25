<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function getIndex() {
        $projects = Project::all();
        return view('admin.projects.home', ['projects' => $projects]);
    }

    public function getAdd() {
        return view('admin.projects.add');
    }

    public function postStore(Request $request) {
        $request->validate([
            'title' => 'required',
            'oneline' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);
        $project = new Project([
            'title' => $request->title,
            'oneline' => $request->oneline,
            'description' => $request->description,
            'link' => $request->link,
        ]);
        $project->save();
        return redirect()->route('projects.index')->with('message', 'Project Successfully Created!');
    }

    public function getShow($id) {
        $project = Project::find($id);
        return view('admin.projects.show', ['project' => $project]);
    }
    
    public function getEdit($id) {
        $project = Project::find($id);
        return view('admin.projects.edit', ['project' => $project]);
    }

    public function postUpdate(Request $request) {
        $request->validate([
            'title' => 'required',
            'oneline' => 'required',
            'description' => 'required',
            'link' => 'required'
        ]);
        $project = Project::find($request->id);
        $project->title = $request->title;
        $project->oneline = $request->oneline;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();
        return redirect()->route('projects.index')->with('message', 'Project Successfully Updated!');
    }

    public function getDelete($id) {
        $post = Project::find($id);
        $post->delete();
        return redirect()->route('projects.index')->with('message', 'Project Successfully Deleted!');
    }
}
