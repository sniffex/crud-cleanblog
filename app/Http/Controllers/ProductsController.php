<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::with('category')->get();
        return view('posts', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = "$productImage";
        }
        $product = new Products();
        $product->title = $input['title'];
        $product->content = $input['content'];
        $product->image = $input['image'];
        $product->category_id = $input['category_id'];
        $product->save();
        return redirect('/')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $data = Products::find($id);
    $categories = Category::all();
    return view('edit', compact('data', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Products::find($id);

    if(!$product) {
        return redirect('posts')->with('error', 'Product not found.');
    }

    $product->title = $request->input('title');
    $product->content = $request->input('content');
    $product->category_id = $request->input('category_id');

    if($request->hasFile('image')){
        $image = $request->file('image');
        $destinationPath = 'images/';
        $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $productImage);
        $product->image = $productImage;
    }

    $product->save();

    return redirect('/')->with('success', 'Post updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Products::where('id', $id)->delete();
        return redirect('/')->with('success', 'Post deleted successfully.');
    }
}
