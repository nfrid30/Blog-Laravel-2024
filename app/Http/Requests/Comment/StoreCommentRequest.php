<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Common\CommonRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Validation\Rule;

class StoreCommentRequest extends CommonRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'max:255'],
            'post_id' => ['required', 'int', Rule::exists(Post::class, 'id')],
            'user_id' => ['int'],
            'comment_id' => ['nullable','int', Rule::exists(Comment::class, 'id')],
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
