<?php

namespace App\Http\Requests\Admin\Data;

use App\Http\Requests\Request;

class CategoryRequest extends Request
{

    protected $redirect = 'admin/data/category/create';

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
            'name' => 'required|unique:categories|max:255',
            'name' => array ('Regex:/^[A-Za-z0-9 ]+$/'),
            'standard_info' => 'required',
        ];
    }

}
