<?php

namespace App\Http\Requests;

use App\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use App\Exceptions\ThrottleException;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Gate::allows('create_comment', new Comment);
        return true;
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
            'body' => 'required'
        ];
    }
}
