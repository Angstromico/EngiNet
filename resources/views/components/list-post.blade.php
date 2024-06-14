<div class="w-full">
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publications</h2>
        @if($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Image {{ $post->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">{{ $slug }}</p>
        @endif
    </section>
</div>
