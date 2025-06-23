<?php

// psr 4 standartlarina uygun olsun deye bu namespaceni yaziriq (faylin yolu)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create() {
        return view('category.create');
    }



public function store(CategoryStoreRequest $request) {
    Category::query()
        ->create([
            'name' => $request->name,
            'description' => $request->description
        ]);


    return to_route('category.create')->with('success', 'Category created');
}

public function index()
{
    $categories = Category::query()
    ->get();
    return view('category.index', compact('categories'));
}


public function edit($id) 
{
    $category = Category::query()
    ->where('id', $id)
    ->first();
 return view('category.edit', compact('category'));
}

public function update($id, CategoryUpdateRequest $request){
    Category::query()
    ->where('id', $id)
    ->update([
            'name' => $request->name,
            'description' => $request->description
    ]);

    return to_route('category.edit', $id)->with('success', 'Category updated');   
}

public function destroy($id)
{
    Category::query()
    -where('id', $id)
    ->delete();

    return to_route('category.index')->with('success', 'Category deleted');  
}
}


