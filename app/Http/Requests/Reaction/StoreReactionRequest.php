<?php

namespace App\Http\Requests\Reaction;

use App\Http\Requests\Common\CommonRequest;
use App\Models\Post;
use Illuminate\Validation\Rule;


class StoreReactionRequest extends CommonRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'is_liked' => [
                'required',
                'bool',
                ],
            'post_id' => [
                'required',
                'int',
                Rule::exists(Post::class, 'id')
            ],
            'user_id' => [
                'required',
                'int',
                ],
        ];
    }
    protected function prepareForValidation(): void {
        $this->merge([
            'is_liked' => $this->boolean('is_liked'),
            'user_id' => auth()->id(),
        ]);
    }
}
