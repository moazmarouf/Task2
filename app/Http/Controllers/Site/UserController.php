<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login() {
        return view ('site.user.login');
    }
    public function postLogin(Request $request) {

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect() -> route('user.index');
        }else{
            return redirect() -> back() ->with(['error' => 'هناك خطا في البيانات']);
        }


    }
    public function index() {
        return view('site.user.index');
    }

}
