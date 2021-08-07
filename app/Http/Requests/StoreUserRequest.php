<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Cache\RateLimiter;

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
            'short_bio' => 'nullable|string|max:255',
            'avatar' => 'mimes:jpg,png,jpeg',
        ];

        if (request()->isMethod('post')) {
            $rules['email'] = 'sometimes|required|max:255|string|email|unique:users,email';
            $rules['name'] = 'required|max:255|string|unique:users,name';
            $rules['password'] = 'required|min:8|max:255|confirmed';
        } else {
            $rules['email'] = 'sometimes|required|max:255|string|email|unique:users,email,' . $this->user->id;
            $rules['name'] = 'required|max:255|string|unique:users,name,' . $this->user->id;
        }

        return $rules;
    }
}
