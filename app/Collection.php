<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Collection extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsToMany(User::class);
    }
}
