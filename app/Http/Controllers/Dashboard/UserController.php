<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }
    public function createUser(){
        return view('dashboard.users.create');
    }
    public function storeUser (UserRequest $request)
    {
        $input = $request->only('name', 'email');
        $input['password'] = Hash::make($request->input('password'));
        $user = User::create($input);

        if($request->hasFile('path')){
            $files = $request->file('path');
            foreach ($files as $file){
                $imageName = time() . '.'. $file->getClientOriginalName();
                $file->move(public_path('uploads'),$imageName);
                $user->Photo()->create([
                   'path' => $imageName
                ]);
            }
        }

        return redirect()->back() -> with(['success' => 'User has been added successfully']);
    }
    public function editUser($id){

        $user = User::find($id);
        $photos = Photo::where('user_id',$user->id)->get();
        return view('dashboard.users.edit',compact('user','photos'));
    }
    public function updateUser(Request $request,$id) {

        $user = User::find($id);
        $input  = $request->only('name','phone','email');
        if(!empty($request->path)){
            $photo = Photo::whereIn('id',$request->path)->delete();
        }
        if(!is_null($request->input('password'))){
            $input['password'] = Hash::make($request->input('password'));
        }
        if($request->hasFile('path')){
            $files = $request->file('path');
            foreach ($files as $file){
                $imageName = time() . '.'. $file->getClientOriginalName();
                $file->move(public_path('uploads'),$imageName);
                $user->Photo()->create([
                    'path' => $imageName
                ]);
            }
        }


        $user->update($input);
        return redirect()->route('index.user')->with(['success' => 'User Has Updated Successfully']);
    }

    public function getDelete($id){
        $user = User::find($id);
        return view('dashboard.users.delete',compact('user'));
    }
    public function delete(Request $request,$id) {
        $user = User::find($id);
        $user->delete();
        return redirect() ->route('index.user') ->with(['success' => 'User Has Deleted Successfully']);
    }
}
