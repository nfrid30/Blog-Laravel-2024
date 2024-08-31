<div style="margin-left: {{ $margin }}px">
    @foreach($comments as $comment)
        <div id="comment-{{$comment->id}}">
            <div class="d-flex justify-content-between">
                <div>
                    <b>{{ $comment->user->name }}</b>
                </div>
                @can('owner', $comment)
                    <div>
                        <button class="btn btn-sm btn-outline-warning" type="button"
                                onclick="editComment( '{{$comment->id}}', '{{ route('comments.update', compact('comment')) }}')">
                            E
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" type="button"
                                onclick="deleteComment('{{ route('comments.destroy', compact('comment')) }}', '{{$comment->id}}')">
                            X
                        </button>
                    </div>
                @endcan
            </div>
            <p>{{ $comment->created_at->diffForHumans() }}</p>
            <div id="comment-text-wrapper-{{$comment->id}}">
                <p id="comment-text-{{$comment->id}}">{{ $comment->text }}</p>
            </div>
            @auth
                <button class="btn btn-sm btn-outline-secondary" onclick="openForm('commentForm-{{$comment->id}}')">
                    Reply
                </button>
                <x-comments.form :$post :$comment/>
            @endauth
            @if($comment->comments)
                <x-comments.list :comments="$comment->comments" :$post :margin="$margin + 40"/>
            @endif
        </div>
    @endforeach
</div>

<script>
    function deleteComment(route, commentId) {
        sendDeleteRequest(route)
            .then((json) => {
                if(json.status === 'success') {
                    document.querySelector(`#comment-${commentId}`).remove()
                }
            })
            .catch(error => error)
    }

    function sendDeleteRequest(route) {
        return fetch(route, {
            headers: {
                "X-CSRF-Token": '{{csrf_token()}}',
                "Content-Type": "application/json"
            },
            method: 'DELETE',
        }).then(response => response.json())
    }

    function editComment(id, route) {
        let commentDiv = document.querySelector(`#comment-text-${id}`)
        let text = commentDiv.innerHTML
        commentDiv.hidden = true
        let textArea = document.createElement('textarea')
        textArea.classList = "form-control"
        textArea.id = 'text-area-' + id
        textArea.value = text
        document.querySelector(`#comment-text-wrapper-${id}`).append(textArea)
        let btn = document.createElement('div')
        btn.innerHTML = `<button class="btn btn-sm btn-secondary my-1" onclick="updateComment('${id}', '${route}')"> Save</button>`
        document.querySelector(`#comment-text-wrapper-${id}`).append(btn)
    }

    function updateComment(id, route) {
        let text = document.querySelector(`#text-area-${id}`).value
        return fetch(route, {
            headers: {
                "X-CSRF-Token": '{{csrf_token()}}',
                "Content-Type": "application/json"
            },
            method: 'PUT',
            body: JSON.stringify({text}),
        }).then(response => response.json())
            .then((json) => {
                if(json.status === 'success') {
                    document.querySelector(`#text-area-${id}`).remove()
                    document.querySelector(`#comment-text-${id}`).innerHTML = text
                    document.querySelector(`#comment-text-${id}`).hidden = false
                }
            })
    }
</script>
