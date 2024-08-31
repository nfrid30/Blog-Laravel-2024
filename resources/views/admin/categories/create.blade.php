<x-admin.layout title="Create Categories">
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>

        <div class="form-group my-2">
            <button class="btn btn-dark mx-1">Create</button>
        </div>
    </form>
</x-admin.layout>
