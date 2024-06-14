@extends('layouts.app')

@section('title')
    Login on EngiNet
@endsection

@section('content')
    <section class="flex flex-col lg:flex-row max-w-[1500px] mx-auto w-full justify-center px-2 gap-6 items-center p-5">
        <div class="w-full lg:w-6/12">
            <img class="rounded-lg" src="{{ asset('img/login.jpg') }}" alt="Register img">
        </div>
        <div class="w-full lg:w-4/12 rounded-lg bg-white p-6 shadow">
            <form action={{ route('login') }} method="POST">
                @csrf
                @if(session('message'))
                    <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ session('message') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-blue-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email" class="border p-3 rounded-lg w-full outline-blue-600 @error('email') border-red-600 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-blue-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Your password" class="border p-3 rounded-lg w-full outline-blue-600 @error('password') border-red-600 @enderror">
                    @error('password')
                        <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"> <label style="color:  rgb(107 114 128)" class="text-sm font-bold" for="remember">Keep the section up!</label>
                </div>
                <input type="submit" value="Login Account" class="bg-sky-700 hover:bg-sky-900 transition-all duration-300 cursor-pointer text-gray-300 hover:text-white uppercase font-bold w-full p-3 rounded-lg">
            </form>
        </div>
    </section>
@endsection




