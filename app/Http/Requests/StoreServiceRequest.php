<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
