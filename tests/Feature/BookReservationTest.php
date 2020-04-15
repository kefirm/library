<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use WithoutMiddleware;
use App\Book;

class BookReservationTest extends TestCase
{

    use RefreshDatabase;
    /** @test */
    public function a_book_can_be_added_to_the_library()
    {


        $this->withoutExceptionHandling();

        $response= $this->post('/books', [
           'title' => 'Cool book title',
           'author' => 'milosz',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    /** @test */
    public function a_title_is_required()
    {
        //$this->withoutExceptionHandling();

        $response= $this->post('/books', [
            'title' => '',
            'author' => 'milosz'
        ]);
        $response->assertSessionHasErrors('title');

    }

    /** @test */
    public function a_author_is_required()
    {
        //$this->withoutExceptionHandling();

        $response= $this->post('/books', [
            'title' => 'Cool title',
            'author' => ''
        ]);
        $response->assertSessionHasErrors('author');

    }

    /** @test */
    public function a_book_can_be_updated()
    {
        $this->withoutExceptionHandling();
         $this->post('/books', [
            'title' => 'Cool title',
            'author' => 'Author'
        ]);

        $book = Book::first();

        $response = $this->patch('/books/'. $book->id, [
            'title' => 'New title',
            'author' => 'New Author'
        ]);

        $this->assertEquals('New title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);


    }
}
