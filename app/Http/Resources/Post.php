<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    public static $wrap = 'post';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'previewImage' => $this->featured_image,
            'published_at' => $this->published_at->format('Y-m-d\TH:i:s'),
            'selectedTags' => Tag::collection($this->tags)
        ];
    }
}
