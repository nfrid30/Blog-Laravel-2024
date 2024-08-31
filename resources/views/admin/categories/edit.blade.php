<x-admin.layout title="Edit Categories">
    <form action="{{ route('admin.categories.update', compact('category')) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" name="name" type="text" id="name" value="{{$category->name}}">
        </div>

        <div class="form-group my-2">
            <button class="btn btn-dark mx-1">Save</button>
            <button class="btn btn-dark" form="delete">Delete</button>

        </div>
    </form>
    <form id="delete" action="{{ route('admin.categories.destroy', compact('category')) }}" method="post">
        @csrf
        @method('delete')
    </form>
</x-admin.layout>
