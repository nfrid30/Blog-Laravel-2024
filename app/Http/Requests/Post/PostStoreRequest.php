<?php

namespace App\Http\Requests\Post;


use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostStoreRequest extends PostCommonRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return parent::rules() + [
                'user_id' => ['int'],
                'slug' => ['string', Rule::unique(Post::class, 'slug')],
            ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
            'slug' => str($this->title)->slug()->toString(),
        ]);
    }
}
