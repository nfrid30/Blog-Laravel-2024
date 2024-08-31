<form action="{{ route('comments.store') }}" method="post"
      @isset($comment) hidden id="commentForm-{{$comment->id}}" class="commentForm" @endisset>

    @csrf
    <h3>Write comments</h3>
    <div class="row">
        <input type="hidden" value="{{ $post->id }}" name="post_id">
        @isset($comment)
            <input type="hidden" value="{{ $comment->id }}" name="comment_id">
        @endisset
        <div class="col-md-6">
            <textarea class="form-control" name="text" id="" cols="6" rows="3"></textarea>
        </div>
    </div>
    <button class="btn btn-sm btn-dark my-2">Send</button>
</form>
