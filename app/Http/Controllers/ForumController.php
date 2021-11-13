<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\TopicComment;
use App\TopicCommentReply;
use Validator;
use Auth;
class ForumController extends Controller
{
    
    public function details($id)
    {
        $topic = Topic::findOrFail($id);
        return view('backend.modules.student.forum_topic',compact('topic'));
    }
    public function save(Request $request)
    {
        //dd($request);
        Validator::make($request->all(),[
            'heading' => 'required',
            'description' => 'required',
            'image' => 'max:3000',
            ])->validate();
        
        $topic = new Topic();
        $topic->user_id = Auth::user()->id;
        $topic->heading = $request['heading'];
        $topic->description = $request['description'];
        if ($request->hasFile('image')) {
            $image_folder = public_path('img/forum');
              
            //Apartment Video
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $topic->id . '.' . $extention;
            //Upload File
            $request->file('image')->move($image_folder, $ImageNameToStore);
        }
        $topic->img = $fileName . $topic->id . '.' . $extention;
        $topic->status = 0; //pending
        $topic->save();
        return redirect()->back()->with(['saved_success' => 1]);

    }
    public function save_comment(Request $request)
    {
        $comment = new TopicComment();
        $comment->topic_id = $request->topic_id;
        $comment->student_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->status = 1;
        $comment->save();
        $comments = TopicComment::where('topic_id',$request->topic_id)->orderBy('created_at','ASC')->get();
        return view('backend.modules.student.comments',compact('comments'));
    }
}
