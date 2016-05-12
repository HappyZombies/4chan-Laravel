<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ThreadRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => 'required|image',
            'title'=> 'max:30',
            'author'=>'max:30',
            'comment' => 'required|max:2000',
        ];
    }
}
