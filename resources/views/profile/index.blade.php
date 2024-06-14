@extends('layouts.app')

@section('title')
    Edid Profile: <span class="capitalize">{{ auth()->user()->username }}</span>
@endsection

@section('content')
    <div class="md:flex justify-center">
        <div class="md:w-1/2 bg-white p-6 shadow rounded">
            <form class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data"
                  action="{{ route('profile.store') }}">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-blue-500 font-bold">UserName</label>
                    <input type="text" id="username" name="username" placeholder="Your username"
                           class="border p-3 rounded-lg w-full outline-blue-600 @error('username') border-red-600 @enderror"
                           value="{{ auth()->user()->username }}">
                    @error('username')
                    <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-blue-500 font-bold">Email</label>
                    <input type="text" id="email" name="email" placeholder="Your email"
                           class="border p-3 rounded-lg w-full outline-blue-600 @error('email') border-red-600 @enderror"
                           value="{{ auth()->user()->email }}">
                    @error('email')
                    <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-blue-500 font-bold">Profile Image</label>
                    <input type="file" id="image" name="image"
                           class="border p-3 rounded-lg w-full outline-blue-600"
                           accept=".jpg, .jpeg, .png, .svg, .gif">
                </div>
                <input type="submit" value="Change User"
                       class="bg-sky-700 hover:bg-sky-900 transition-all duration-300 cursor-pointer text-gray-300 hover:text-white uppercase font-bold w-full p-3 rounded-lg">
            </form>
        </div>
    </div>
@endsection
