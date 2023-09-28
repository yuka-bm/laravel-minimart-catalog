<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;

class ProductController extends Controller
{
    private $product;
    private $section;

    public function __construct(Product $product, Section $section)
    {
        $this->product = $product;
        $this->section = $section;
    }

    public function index()
    {
        $products = $this->product->latest()->get();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        $all_sections = $this->section->latest()->get();

        return view('products.create')->with('sections', $all_sections);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | min:1 | max:50',
            'description' => 'required | min:1',
            'price' => 'required | between:0,999.99 | numeric',
            'section' => 'required'
        ]);

        $this->product->name = $request->name;
        $this->product->description = $request->description;
        $this->product->price = $request->price;
        $this->product->section_id = $request->section;
        $this->product->save();

        return  redirect()->route('index');
    }

    public function edit($product_id)
    {
        $product = $this->product->findOrFail($product_id);
        $all_sections = $this->section->latest()->get();

        return view('products.edit')->with('product', $product)
                                    ->with('sections', $all_sections);
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'name' => 'required | min:1 | max:50',
            'description' => 'required | min:1',
            'price' => 'required | between:0,999.99 | numeric',
            'section' => 'required'
        ]);

        $product = $this->product->findOrFail($product_id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->section_id = $request->section;
        $product->save();

        return  redirect()->route('index');
    }

    public function destroy($product_id)
    {
        $this->product->destroy($product_id);

        return redirect()->back();
    }
}