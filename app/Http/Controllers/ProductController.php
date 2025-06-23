<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ProductController extends Controller
{
    public function create()
    {
        $colors = Color::query()
        ->get();
        return view('product.create', compact('colors'));
    }


    public function store(ProductStoreRequest $request)
    {
        $product = Product::query()
        ->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        foreach ($request->color_ids as $color_id) {
            ProductColor::query()
            ->create([
                'product_id' => $product->id,
                'color_id' => $color_id,
            ]);
        }

        return to_route('product.create');
    }

    public function index()
    {
        $products = Product::query()
        ->with('colors1')
        ->get();

        return view('product.index', compact('products'));
    }

}
