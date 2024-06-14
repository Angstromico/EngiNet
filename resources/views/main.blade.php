@extends('layouts.app')

@section('title')
    Main Page
@endsection

@section('content')
    {{--@if($posts->count())
        @foreach($posts as $post)
            <h1>{{ $post->title }}</h1>
        @endforeach
    @else
        <p>There isn't any post</p>
    @endif--}}

    {{--@forelse($posts as $post)
        <h1>{{ $post->title }}</h1>
    @empty
        <p>There isn't any post</p>
    @endforelse--}}

    {{--<x-list-post>
        <x-slot:posts>
            {{ $posts }}
        </x-slot:posts>
    </x-list-post>--}}
    <x-list-post :posts="$posts">
        There is not any post available, follow
        someone to see most posts here
    </x-list-post>
@endsection
