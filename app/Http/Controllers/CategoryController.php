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

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          
        return view('categories.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Category::create([
            'name'=> $request->name,
            'description' => $request->description,
        ]);

        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        if($category){
            return view('categories.edit', compact('category'));
        }

        return redirect()->route('categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        if($category){
            $category->update([
                'name'=> $request->name,
                'description' => $request->description,
            ]);
        }

        $categories = Category::all();
        
        return view('categories.index', compact('categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if($category){
            $category->delete();
        }

        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
}
