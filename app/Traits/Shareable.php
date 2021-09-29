<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Shareable
{
    protected $shareOptions = [
        'columns' => [
            'title' => 'title'
        ],
        'url' => null
    ];

    public function getUrlAttribute()
    {
        return route('posts.show', $this->title);
    }
    
    public function getShareUrl($type = 'facebook')
    {
        $url = $this->{Arr::get($this->shareOptions, 'url')} ? $this->{Arr::get($this->shareOptions, 'url')} : url()->current();

        if ($type == 'facebook') {
            $query = urldecode(http_build_query([
                'u' => $url,
                'display' => 'popup',
                'title' => urlencode($this->{Arr::get($this->shareOptions, 'columns.title')})
            ]));

            return 'https://www.facebook.com/sharer/sharer.php?' . $query;
        }

        if ($type == 'twitter') {
            $query = urldecode(http_build_query([
                'url' => $url,
                'text' => urlencode(Str::limit($this->{Arr::get($this->shareOptions, 'columns.title')}, 120))
            ]));

            return 'https://twitter.com/intent/tweet?' . $query;
        }
    }
}
