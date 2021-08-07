<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Illuminate\Support\Facades\Gate;
use App\Exceptions\ThrottleException;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create_post', new Post);
    }

    protected function failedAuthorization()
    {
        throw new ThrottleException(
            'Action too frequently. Not allowed'
        );
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (is_string(request('tags'))) {
            $this->merge([
                'tags' => json_decode(request('tags')),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string'
        ];

        if (request()->isMethod('post')) {
            $rules['featured_image'] = 'required|image|mimes:jpeg,png,jpg';
            $rules['tags'] = 'required';
        } else {
            $rules['featured_image'] = 'image|mimes:jpeg,png,jpg';
        }

        return $rules;
    }
}
