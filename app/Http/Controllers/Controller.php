<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Project;
use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getIndex() {
        $projects = Project::orderBy('created_at', 'desc')->paginate(6, ['*'], 'portfolio');
        $bio_path = public_path('storage/bio.txt');
        $bio = file_get_contents($bio_path);
        return view('home', ['projects' => $projects, 'bio' => $bio]);
    }

    public function postIndex(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('#contact')->withErrors($validator)->withInput();
        }
        $mail = new Mail([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        $mail->save();
        return redirect('#contact')->with('mail', 'true');

    }

    public function getAdminIndex() {
        $file_path = public_path("storage/bio.txt");
        $bio = file_exists($file_path) ? file_get_contents($file_path) : file_put_contents($file_path, '');
        return view('admin.home', ['bio' => $bio]);
    }

    public function postAdminUpdateBio(Request $request) {
        $request->validate([
            'bio' => 'required|string',
        ]);
        $content = $request->bio;
        $file_path = public_path("storage/bio.txt");
        file_put_contents($file_path, $content);
        return redirect()->route('admin.home')->with('message', 'About Text Successfully Updated!');
    } 

    public function postAdminChangeProfileImage(Request $request) {
        $request->validate([
            'photo' => 'image|required'
        ]);
        $request->photo->storeAs('public/img/', 'profileImage.jpg');
        return redirect()->route('admin.home')->with('message', 'Profile Image Successfully Updated!');
    }

    public function postAdminChangeResume(Request $request) {
        $request->validate([
            'resume' => 'required'
        ]);
        $request->resume->storeAs('public/', 'WyattJohnson.pdf');
        return redirect()->route('admin.home')->with('message', 'Resume Updated Successfully!');
    }

    public function getMailIndex() {
        $mails = Mail::all();
        return view('admin.mail', ['mails' => $mails]);
    }
    
    function getDeleteMail($id) {
        $mail = Mail::find($id);
        $mail->delete();
        return redirect()->route('mail.index')->with('message', 'Message Successfully Deleted!');
    }
}
