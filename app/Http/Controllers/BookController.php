<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // bukan memakai Book::all, untuk menghindari N+1 query problem.
        // Jika tabel Author direalisasikan, relasi menggunakan array '[ ]'
        $books = Book::with('category')->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isbn' => 'required|string|unique:book',
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'description' => 'nullable|string|max:300',
            'publish_year' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            $validatedData['cover'] = $validatedData['isbn'] . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $validatedData['cover'], 'public'); // method move dipakai utk import data, tapi kita biasanya pakai storeAs agar lebih aman. Jangan lupa kalau pake method move, dihapus filenya
        }
        Book::create($validatedData);
        return redirect()->route('book.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'description' => 'nullable|string|max:300',
            'publish_year' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete('uploads/' . $book->cover);
            }
            $validatedData['cover'] = $validatedData['isbn'] . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $validatedData['cover'], 'public'); // method move dipakai utk import data, tapi kita biasanya pakai storeAs agar lebih aman. Jangan lupa kalau pake method move, dihapus filenya
        }
        Book::create($validatedData);
        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
