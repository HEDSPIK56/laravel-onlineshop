<?php

namespace App\Http\Requests\Admin\System;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class RoleUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole(['admin', ['root']]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ];
    }
}
