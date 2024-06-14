@extends('layouts.app')

@section('title')
    Create New Post
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <section class="md:flex justify-center px-3 items-center w-full mx-auto max-w-[1200px] gap-10 md:gap-5">
        <div class="w-full md:1/2 px-10">
            <form id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center" method="POST" action="{{ route('images.store') }}">
                @csrf
            </form>
        </div>
        <div class="w-full md:1/2 px-10 rounded-lg bg-white p-8 shadow mt-12 md:mt-0">
            <form class="w-full" action={{ route('posts.store') }} method="POST">
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-blue-500 font-bold">Title</label>
                    <input type="text" id="title" name="title" placeholder="Post title" class="border p-3 rounded-lg w-full outline-blue-600 @error('title') border-red-600 @enderror" value="{{ old('title') }}">
                    @error('title')
                    <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-blue-500 font-bold">Description</label>
                    <textarea  id="description" name="description" placeholder="Post description" class="border p-3 rounded-lg w-full outline-blue-600 @error('description') border-red-600 @enderror">{{ old('title') }}</textarea>
                    @error('description')
                    <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="hidden" name="image" value="{{ old('image') }}">
                    @error('image')
                    <p class="bg-red-600 text-center text-sm my-5 font-bold text-white p-2 rounded-lg">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Create Post" class="bg-sky-700 hover:bg-sky-900 transition-all duration-300 cursor-pointer text-gray-300 hover:text-white uppercase font-bold w-full p-3 rounded-lg">
            </form>
        </div>
    </section>
@endsection
