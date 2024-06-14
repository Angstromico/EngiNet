<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;

    class ProfileController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            return view('profile.index');
        }

        public function store(Request $request)
        {
            $request->request->add(['username' => Str::slug($request->username)]);

            $this->validate($request, [
                'username' => 'required|unique:users|not_in:edit-profile',
                'email' => 'email|unique:users|max:60'
            ]);

            if ($request->image) {
                $image = $request->file('image');

                $nameImage = Str::uuid() . '.' . $image->extension();

                $imageServer = Image::make($image);
                $imageServer->fit(500, 500);
                $imagePath = public_path('profiles/' . $nameImage);
                $imageServer->save($imagePath);

                $user = User::find(auth()->user()->id);

                $user->username = $request->username;
                $user->image = $nameImage;
                $user->save();

                return redirect()->route('posts.index', $user->username);
            }

            $user = User::find(auth()->user()->id);

            $user->username = $request->username;
            if ($request->email) {
                $user->email = $request->email;
            }
            $user->save();

            return redirect()->route('posts.index', $user->username);
        }
    }
