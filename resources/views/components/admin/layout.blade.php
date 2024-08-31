<x-layout title="Admin Panel" offCategories>
    <div class="row container">
        <div class="col-2">
            <a class="btn btn-dark my-1" href="{{ route('admin.categories.index') }}">Categories</a>
            <a class="btn btn-dark my-1" href="{{ route('admin.tags.index') }}">Tags</a>
        </div>
        <div class="col-10">
            <h1>{{$title}}</h1>
            {{ $slot }}
        </div>
    </div>
</x-layout>
