<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.list',compact('categories'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return 'store';
        // var_dump($request->all());
        // die();
        $request->validate([
            'categoryName' => 'min:3|required',
        ]);


        $categoryName = $request->categoryName;

        Category::create([
            'name' => $categoryName,
        ]);

        //return $categoryName;
       
        return redirect()->route('categories.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.category.detail',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $category = Category::find($id);
       return view('backend.category.edit',compact('category'));    
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // var_dump($request->all());
        // die();
        $request->validate([
            'categoryName' => 'required|min:3',
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
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');

    }
}
