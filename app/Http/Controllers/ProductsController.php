<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::get();
        return view('posts', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = "$productImage";
        }
        Products::create($input);
        return redirect('posts')->with('success', 'Post created successfully.');
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
        $data = Products::where('id', $id)->first();
        return view('edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Products::find($request->id);

        if(!$product) {
            return redirect('posts')->with('error', 'Product not found.');
        }

        $product->title = $request->input('title');
        $product->content = $request->input('content');
        $product->category = $request->input('category');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $destinationPath = 'images/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $product->image = $productImage;
        }

        $product->save();

        return redirect('posts')->with('success', 'Post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Products::where('id', $id)->delete();
        return redirect('posts')->with('success', 'Post deleted successfully.');
    }
}
