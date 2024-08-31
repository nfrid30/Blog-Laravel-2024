<x-admin.layout title="Categories">
    <a class="btn btn-dark" href="{{ route('admin.categories.create') }}">Create Category</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a class="btn btn-secondary" href="{{ route('admin.categories.edit', compact('category')) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-admin.layout>
