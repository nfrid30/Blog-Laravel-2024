<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Common\CommonRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends CommonRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:50'
            ],
        ];
    }
}
