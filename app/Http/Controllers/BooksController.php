<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{

    public function store()
    {
        Book::create($this->validateRequest());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());
    }

    /**
     * @return array
     */
    public function validateRequest(): array
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }
}
