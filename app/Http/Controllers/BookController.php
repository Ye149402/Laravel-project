<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('backend.book.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookName' => 'required|min:3',
            'bookAuthor' => 'required|min:3',
            'bookPrice' => 'required|numeric',
            'bookCategory' => 'required|exists:categories,id',
            'bookImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bookDescription' => 'required|min:15',
        ]);

         $book = new Book();
         $book->name = $request->bookName;
         $book->author = $request->bookAuthor;
         $book->price = $request->bookPrice;
         $book->category_id = $request->bookCategory;
         $book->description = $request->bookDescription;

         if ($request->hasFile('bookImage')) {
            $image = $request->file('bookImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('images/books');
            $image->move($uploadPath, $imageName);
            $book->image = 'images/books/'. $imageName;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('backend.book.detail', compact('book'));
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
        // var_dump($request->all());
        // die();
        $request->validate([
           'bookName' => 'required|min:3',
            'bookAuthor' => 'required|min:3',
            'bookPrice' => 'required|numeric',
            'bookCategory' => 'required|exists:categories,id',
            'bookImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bookDescription' => 'required|min:15',
        ]);

        $categoryName = $request->categoryName;

        // update into database table
        $category = Category::find($id);
        $category->name = $categoryName;
        $category->save();

        // redirect to list page
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}