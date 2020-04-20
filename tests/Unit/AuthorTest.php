<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
    public function only_name_is_required_to_create()
    {
        Author::firstOrCreate(
            ['name' => 'Jan Kowalski']
        );

        $this->assertCount(1, Author::all());
    }




}
