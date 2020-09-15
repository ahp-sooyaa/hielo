<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function has_posts()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->posts);
    }
}
