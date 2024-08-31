<x-layout>
    <h1>Edit Post</h1>
    <form action="{{route('posts.update', compact('post'))}}"
          enctype="multipart/form-data"
          method="post">
        @csrf
        @method('put')
        <x-blog.post-form :$post />
        <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status" id="">
                @foreach(\App\Enums\Post\PostStatusEnum::cases() as $status)
                <option @selected($post->status===$status) value={{$status->value}}>{{ $status->label() }}</option>
                @endforeach
            </select>
            @error('status')
            <div class="alert alert-danger my-1">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button class="btn btn-dark">Save</button>
        </div>
    </form>
</x-layout>
