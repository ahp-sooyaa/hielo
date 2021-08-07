<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\Followable;
use App\Traits\Bookmarkable;
use App\Traits\RecordActivity;
use App\Traits\Reportable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Followable, Bookmarkable, RecordActivity, Reportable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        return $this->roles()->sync($role);
    }

    /**
     * Check if the user has a role
     */
    public function hasRole(string $role)
    {
        return $this->roles->where('name', $role)->isNotEmpty();
    }

    /**
     * Check if the user has role super-admin
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }

    /**
     * Check if the user has role admin
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id')->whereNotNull('published_at');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'author_id', 'post_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    public function collections()
    {
        return $this->hasMany(Collection::class, 'author_id');
    }

    public function addCollection($name)
    {
        return $this->collections()->create(compact('name'));
    }

    public function lastPost()
    {
        return $this->hasOne(Post::class, 'author_id')->latest();
    }

    public function lastComment()
    {
        return $this->hasOne(Comment::class, 'author_id')->latest();
    }

    public function path($append = '')
    {
        return $append ? "/profiles/{$this->name}/{$append}" : "/profiles/{$this->name}";
    }

    public function setRecentView($postId)
    {
        return request()->session()->push('posts.recently_viewed_' . $this->id, $postId);
    }

    public function getRecentView()
    {
        return session()->get('posts.recently_viewed_' . $this->id);
    }

    public function toSearchableArray()
    {
        return $this->toArray() + ['path' => $this->path()];
    }
}
