<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\Common\CommonRequest;

class UpdateCommentRequest extends CommonRequest
{
    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'max:255'],
        ];
    }
}
