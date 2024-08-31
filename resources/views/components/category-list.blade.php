<div class="nav-scroller py-1 mb-3 border-bottom">
    <nav class="nav nav-underline justify-content-between">
        @foreach($categories as $category)
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach
    </nav>
</div>
