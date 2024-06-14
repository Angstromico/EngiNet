<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auths.login');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|max:60',
            'password' => 'required',
        ]);
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Wrong email or password');
        }

        //Redirect

        return redirect()->route('posts.index', auth()->user()->username);
    }
}

