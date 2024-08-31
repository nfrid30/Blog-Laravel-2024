<?php

namespace App\Http\Requests\Post;



use App\Enums\Post\PostStatusEnum;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class PostUpdateRequest extends PostCommonRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules() + [
            'status' => [
                'int',
                new Enum(PostStatusEnum::class)
                ],
                'slug' => ['string', Rule::unique(Post::class, 'slug')->ignore($this->post, 'slug')],
            ];
    }
}
