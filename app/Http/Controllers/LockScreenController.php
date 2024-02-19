<?php

namespace App\Http\Controllers;

use App\Http\Requests\LockedStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LockScreenController extends Controller
{
    public function index(){

        // only if user is logged in
        if(Auth::check()){
            Session::put('locked', true);
            return view('auth.locked');
        }

        return redirect('/login');
    }

    public function store(LockedStoreRequest $request)
    {
        // if user in not logged in
        if(!Auth::check())
            return redirect('/login');

        $password = $request['password'];

        if(Hash::check($password, Auth::user()->password)){
            Session::forget('locked');
            return redirect()->route('home');
        }


    }
}

