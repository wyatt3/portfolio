<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Project;
use App\BlogPost;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {
        $projects = Project::paginate(6, ['*'], 'portfolio');
        $updates = BlogPost::paginate(3, ['*'], 'updates');
        return view('home', ['projects' => $projects, 'updates' => $updates]);
    }

    public function postIndex(Request $request) {

    }

    public function getAdminIndex() {
        return view('admin.home');
    }
}
