<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;

    class RegisterController extends Controller
    {
        public function index()
        {
            return view('main');
        }


        public function register()
        {
            return view('auths.register');
        }

        public function store(Request $request)
        {
            $request->request->add(['username' => Str::slug($request->username)]);

            $this->validate($request, [
                'name' => 'required|max:30',
                'username' => 'required|unique:users|min:3|max:20',
                'email' => 'required|email|unique:users|max:60',
                'password' => 'required|min:8|confirmed',
            ]);
            /* dd($request->all()); */
            User::create([
                'name' => $request->name,
                'username' => Str::slug($request->username),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //Authenticate users

            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            //Redirect

            return redirect()->route('posts.index', auth()->user()->username);
        }
    }
