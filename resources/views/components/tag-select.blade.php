<div class="my-2">
    <label for="">Tags</label>
    <div class="row">
        @foreach($tags as $tag)
            <div class="col-md-4">
                <input name="tags[]" id="{{ $tag->id }}"
                       @checked($post?->tags?->contains($tag) || in_array($tag->id, old('tags', [ ])))
                       value="{{ $tag->id }}" type="checkbox"> <label for="{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        @endforeach
    </div>
    @error('tags')
    <div class="alert alert-danger my-1">{{ $message }}</div>
    @enderror
    @error('tags.*')
    <div class="alert alert-danger my-1">{{ $message }}</div>
    @enderror
</div>
