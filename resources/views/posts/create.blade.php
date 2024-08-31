<x-layout>
    <h1>Create Post</h1>
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-blog.post-form />
        <div>
            <button class="btn btn-dark">Create</button>
        </div>
    </form>
</x-layout>
