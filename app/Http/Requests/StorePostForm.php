<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Illuminate\Support\Facades\Gate;
use App\Exceptions\ThrottleException;
use App\Notifications\PostPublished;

class StorePostForm extends FormRequest
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
            'featured_image' => 'required|image|mimetypes:image/jpeg,image/png',
            'tags' => 'required|array|min:1',
            'tags.*' => 'required'
        ];
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
        if (is_string($this->tags)) {
            $this->merge([
                'tags' => json_decode($this->tags),
            ]);
        }
    }

    public function persist()
    {
        $attributes = $this->except('tags', 'featured_image', 'published_at');
        $post = $this->user()->posts()->create($attributes + [
            'featured_image' => $this->hasFile('featured_image') ? $this->featured_image->store('featured_images') : null,
            'published_at' => $this->published_at ?: now()
        ]);

        $post->tags()->sync(collect($this->tags)->pluck('id'));

        $this->user()->followers->each->notify(new PostPublished($post));

        return $post;
    }
}
