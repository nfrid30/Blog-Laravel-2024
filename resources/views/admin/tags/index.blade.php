<x-admin.layout title="Tags">
    <a class="btn btn-dark" href="{{ route('admin.tags.create') }}">Create Tag</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td><a class="btn btn-secondary" href="{{ route('admin.tags.edit', compact('tag')) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-admin.layout>
