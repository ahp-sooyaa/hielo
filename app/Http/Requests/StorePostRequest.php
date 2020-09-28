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
        return Gate::allows('create-post', new Post);
    }

    protected function failedAuthorization()
    {
        throw new ThrottleException(
            'Action too frequently. Not allowed'
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'sometimes|required|image|mimes:jpeg,png,jpg',
            'published_at' => 'sometimes|required'
            // 'tags' => 'required'
        ];
    }
}
