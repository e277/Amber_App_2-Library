<?php

namespace App\Http\Livewire\Librarian;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;

    public function createBook()
    {
    }

    public function render()
    {
        $books = Book::join('members', 'members.id', '=', 'books.member_id')
            ->select('members.fname', 'members.lname', 'books.*')
            ->paginate(7);

        return view('livewire.librarian.books', compact('books'));
    }
}
