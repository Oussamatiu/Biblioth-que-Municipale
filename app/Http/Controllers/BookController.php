<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('categorie')->paginate(10);
        return view('dashboard', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('books\create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'isbn' => 'nullable|string|max:20|unique:books,isbn',
            'quantity' => 'required|integer|min:0',
            'published_at' => 'required|date',
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success' , 'book added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books\show' , compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Categorie::all();
        return view('books\edit' , compact('book' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
            'isbn' => 'nullable|string|max:20|unique:books,isbn,' . $book->id,
            'quantity' => 'required|integer|min:0',
            'published_at' => 'required|date',
        ]);
        $book->update($validated);
        return redirect()->route('books.index')->with('success' , 'book updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if($book->emprunts()->whereNull('returned_at')->exists()){
            return redirect()->route('books.index')->with('error', 'Cannot delete book. It is currently loaned.');
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'book deleted successfully');
    }
}
