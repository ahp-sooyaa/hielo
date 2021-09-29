<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Illuminate\Support\Facades\Gate;

class UpdatePostForm extends StorePostForm
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('edit_post', $this->route('post'));
        // return Gate::allows('edit_post', new Post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        $rules['featured_image'] = 'nullable|image|mimes:jpeg,png,jpg';
        $rules['tags'] = 'nullable|array|min:1';

        return $rules;
    }

    public function persist(Post $post = null)
    {
        $post->update($this->except('tags', 'featured_image') + [
            'featured_image' => $this->hasFile('featured_image') ? $this->featured_image->store('featured_images') : $post->featured_image
        ]);

        $post->tags()->sync(collect($this->tags)->pluck('id'));
    }
}
