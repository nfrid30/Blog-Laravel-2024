<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\Common\CommonRequest;


class UpdateTagRequest extends CommonRequest
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
            ]
        ];
    }
}
