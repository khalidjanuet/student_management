<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use Validator;
use App\CourseSession;
class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('backend.modules.session.index',compact('sessions'));
    }
    public function create()
    {
        return view('backend.modules.session.create');
    }
    public function save(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required|unique:sessions',
            ])->validate();
        $session = new Session();
        $session->name = $request['name'];
        $session->save();
        return redirect()->back()->with(['saved_success' => 1]);
    }
   
    public function update(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required|unique:sessions',
            ])->validate();
        $session = Session::findOrFail($request['session_id']);
        $session->name = $request['name'];
        $session->save();
        return redirect()->back()->with(['update_success' => 1]);
    }

    public function delete($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
        $course_sessions = CourseSession::where('session_id',$id)->get();
        foreach($course_sessions as $course_session)
        {
            $course_session->delete();
        }
        return redirect()->back()->with(['delete_success' => 1]);
    }

}
