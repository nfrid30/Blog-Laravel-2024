<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Blog Template · Bootstrap v5.3</title>

    <link rel="stylesheet" href="/css/blog.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10"/>
        <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
    </symbol>
    <symbol id="cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </symbol>
</svg>

<div class="container">
    <div class="container d-flex flex-wrap justify-content-between">
        <div>
            <ul class="nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a>
                </li>
                @auth
                    <li class="nav-item"><a href="{{route('posts.create')}}" class="nav-link link-body-emphasis px-2">Create Post</a></li>
                @endauth
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">About</a></li>
                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link link-body-emphasis px-2">Admin Panel</a></li>
                    @endif
                @endauth
            </ul>
        </div>
        <div class="my-2">
            @auth
                Welcome, <b>{{ auth()->user()->name }}</b>
            @endauth
        </div>
    </div>

    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{route('posts.index')}}">{{$title ?? "Blog Laravel"}}</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <form action="{{ route('posts.index') }}">
                    <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                @guest
                    <a class="btn btn-sm btn-outline-secondary mx-1" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-sm btn-outline-secondary mx-1" href="{{ route('register') }}">Registration</a>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-outline-secondary mx-1">Logout</button>
                    </form>

                @endauth
            </div>
        </div>
    </header>
    @if(!isset($offCategories))
        <x-category-list />
    @endif
</div>
<main class="container">
    {{ $slot }}
</main>
<footer class="py-5 text-center text-body-secondary bg-body-tertiary">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p class="mb-0">
        <a href="#">Back to top</a>
    </p>
</footer>
<script src="/js/bootstrap.bundle.min.js"></script>

</body>
</html>

