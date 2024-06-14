<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>EngiNet - @yield('title')</title>
    @livewireStyles
</head>
<body class="bg-gray-100">
<header class="p-5 shadow border-b bg-white">
    <div class="container mx-auto flex justify-between items-center">
        <a href={{ route('home') }} class="text-3xl font-black">EngiNet</a>
        @if(auth()->user())
            <form method="POST" action={{ route('logout') }} class="flex gap-2 items-center">
            @csrf
            <a class="flex items-center gap-2 border p-2 rounded uppercase font-bold text-blue-600 text-sm"
               href={{ route('posts.create')  }}>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"/>
                </svg>
                Create
            </a>
            <a href="{{ route('posts.index', auth()->user()->username)  }}" class="font-bold text-blue-600 text-sm">Hello
                <span style="font-weight: normal"
                      class="font-normal capitalize">{{ auth()->user()->username }}</span></a>
            <input class="font-bold uppercase text-blue-600 text-sm cursor-pointer" type="submit" value="Logout"/>
            </form>
        @else
            <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-blue-600 text-sm" href={{ route('login') }}>Login</a>
                <a class="font-bold uppercase text-blue-600 text-sm" href={{ route('register') }}>Sign Up</a>
            </nav>
        @endif
    </div>
</header>
<main class="container mx-auto mt-10 w-full min-h-screen">
    <h2 class="text-center font-black text-3xl mb-10">@yield('title')</h2>
    @yield('content')
</main>
<footer class="text-center text-blue-600 p-5 font-bold uppercase mt-10">
    EngiNet - All the rights reserve {{ now()->year }}
</footer>
@livewireScripts
</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>
