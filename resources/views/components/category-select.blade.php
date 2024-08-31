<div class="form-group">
    <label for="category">Categories</label>
    <select class="form-control" name="category_id" id="category">
        @foreach($categories as $category)
            <option @selected(old('category_id', $post?->category_id) == $category->id)
                    value="{{$category->id}}" >{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="alert alert-danger my-1">{{ $message }}</div>
    @enderror
</div>
