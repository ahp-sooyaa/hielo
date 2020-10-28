<?php

namespace App\Http\Resources;

use Gate;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    public static $wrap = 'tag';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'created_at' => $this->created_at->format('Y-m-d\TH:i:s'),
            'avatar' => $this->author->avatar,
            'author_id' => $this->author_id,
            'author_name' => $this->author->name,
            'author_url' => '/' . $this->author->name
        ];
    }
}
