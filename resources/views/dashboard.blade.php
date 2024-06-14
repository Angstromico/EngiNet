@extends('layouts.app')

@section('title')
    User:  {{ $user->username }}
@endsection

@section('content')
    <div class="flex flex-col lg:flex-row justify-center w-full">
        <div class="w-full flex justify-center px-5">
            <img src={{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/user.png')  }} alt="User
                 image" />
        </div>
        <div class="w-full flex flex-col justify-center items-center gap-8 px-5 py-10 lg:items-start">
            <div class="flex gap-3 items-center">
                <p style="text-transform: capitalize"
                   class="text-gray-700 text-3xl capitalize">{{ $user->username  }}</p>

                @auth()
                    @if($user->id === auth()->user()->id)
                        <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                            </svg>
                        </a>
                    @endif
                @endauth
            </div>

            <p class="text-gray-800 text-sm font-bold">
                {{ $user->followers->count() }}
                <span style="font-weight: normal">@choice('Follower|Followers', $user->followers->count())</span>
            </p>
            <p class="text-gray-800 text-sm font-bold">
                {{ $user->followings->count() }}
                <span style="font-weight: normal">@choice('Following|Followings', $user->followings->count())</span>
            </p>
            <p class="text-gray-800 text-sm font-bold">
                {{ $user->posts->count() }}
                <span style="font-weight: normal">Posts</span>
            </p>

            @auth
                @if($user->id !== auth()->user()->id)
                    @if(!$user->following(auth()->user()))
                        <form action="{{ route('users.follow', $user) }}" method="POST">
                            @csrf
                            <input type="submit"
                                   class="bg-blue-600 hover:bg-blue-800 text-white uppercase px-3 py-1 text-xs font-bold rounded-lg cursor-pointer"
                                   value="follow">
                        </form>
                    @else
                        <form action="{{ route('users.unfollow', $user) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit"
                                   class="bg-red-600 hover:bg-red-800 text-white uppercase px-3 py-1 text-xs font-bold rounded-lg cursor-pointer"
                                   value="unfollow">
                        </form>
                    @endif
                @endif
            @endauth
        </div>
    </div>
    <x-list-post :posts="$posts">
        There is not any post available
    </x-list-post>
@endsection
