<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255|string',
            'short_bio' => 'string|max:255',
            'avatar' => 'mimes:jpg,png,jpeg',
            'password' => 'sometimes|required|string|min:8|confirmed'
        ];

        if (request()->method('post')) {
            $rules['email'] = 'sometimes|required|max:255|string|email|unique:users';
        } else {
            $rules['email'] = 'sometimes|required|max:255|string|email|unique:users,email,' . $this->user->id;
        }

        return $rules;
    }
}
