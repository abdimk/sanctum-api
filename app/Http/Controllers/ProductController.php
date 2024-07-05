<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price'=> 'required'
        ]);

        return Product::create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        $product->update($request);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }


    /**
     *  @param str $name
     *  @return Illuminate\Http\Response
     * Search for a product
     */

    
    public function search($name){
        return Product::where('name', 'like','%'.$name.'%')->get();
    }
}
