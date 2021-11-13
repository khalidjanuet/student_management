<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
class UserController extends Controller
{
    public function index($type)
    {
        if($type == 1)
        {
            $users = User::where('role','>',2)->where('role','<',5)->where('status',1)->get();
           // $users = User::where('role',4)->where('status',1)->get();
        }
        else if($type == 5)
        {
            $users = User::where('role',5)->where('status',1)->get();
        }
        else if($type == 6)
        {
            $users = User::where('role',6)->where('status',1)->get();
        }
        return view('backend.modules.user.index',compact('users','type'));
    }
    public function business_admins()
    {
        $type= 6;
        $users = User::where('role',6)->where('is_business_administrator',1)->where('business_lead_id',Auth::user()->id)->get();
        return view('backend.modules.user.index',compact('users','type'));
    }
    public function create($type)
    {
        return view('backend.modules.user.create',compact('type'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.modules.user.edit',compact('user'));
    }
    public function save(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'profile_image' => 'required|max:3000',
            ])->validate();
        
        $user = new User();
        if ($request->hasFile('profile_image')) {
            $image_folder = public_path('img/user');
              
            //Apartment Video
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $user->id . '.' . $extention;
            //Upload File
            $request->file('profile_image')->move($image_folder, $ImageNameToStore);
        }
        $user->img = $fileName . $user->id . '.' . $extention;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        if($request['role'] == 3)
        {
            foreach($request['modules'] as $module)
            {
                if($module == 1) $user->listening = 1;
                elseif($module == 2) $user->reading = 1;
                elseif($module == 3) $user->writing = 1;
                elseif($module == 4) $user->speaking = 1; 
            }
            
            $user->role = 3;
        }
        else if($request['role'] == 4)
        {
            $user->role = 4;
            $user->is_business_leader = 1;
        }
       
        else if($request['role'] == 6)
        {
            $user->role = 6;
            $user->is_business_administrator = 1;
            $user->business_lead_id = Auth::user()->id;
        }
        $user->status = 1;
        $user->save();
        return redirect()->back()->with(['saved_success' => 1]);

    }
    public function update(Request $request)
    {
       // dd($request);
        $user = User::findOrFail($request['user_id']);
        if ($request->hasFile('profile_image')) {
            $image_folder = public_path('img/user');
              
            //Apartment Video
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathInfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extention
            $extention = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $ImageNameToStore = $fileName . $user->id . '.' . $extention;
            //Upload File
            $request->file('profile_image')->move($image_folder, $ImageNameToStore);
            $user->img = $fileName . $user->id . '.' . $extention;
        }
        
        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request['password'])
            $user->password = bcrypt($request['password']);

            if($request['role'] == 3)
            {
                $user->listening = 0;$user->reading = 0;$user->writing = 0;$user->speaking = 0;
                foreach($request['modules'] as $module)
                {
                    
                    if($module == 1)
                    {$user->listening = 1; }
                    if($module == 2)
                    {$user->reading = 1; }
                    if($module == 3)
                    {$user->writing = 1;} 
                    if($module == 4)
                    {$user->speaking = 1;}  
                }
                $user->role = $request['role'];
            
            }
            
        $user->save();
        //dd($user);
        return redirect()->back()->with(['updated_success' => 1]);

    }
}
