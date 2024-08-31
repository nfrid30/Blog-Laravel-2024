<?php

namespace App\Http\Requests\Subscription;

use App\Http\Requests\Common\CommonRequest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubscriptionRequest extends CommonRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'author_id' => [
                'int',
                Rule::exists(User::class, 'id'),
            ],
            'reader_id' => [
                'int'
            ]
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'reader_id' => auth()->id(),
        ]);
    }
}
