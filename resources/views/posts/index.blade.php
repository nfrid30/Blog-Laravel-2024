<x-layout>
    <div class="row mb-2">
        @foreach($posts as $post)
            <x-blog.post :post="$post" />
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
