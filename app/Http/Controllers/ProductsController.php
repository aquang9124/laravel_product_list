<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Http\Requests;

class ProductsController extends Controller
{
	 /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // This function will show a more detailed product view
    public function show(Product $product)
    {
    	return view('product', compact('product'));
    }

    // This function will store a new product listing
    public function store(Request $request, User $user)
    {
    	$this->validate($request, [
    		'manufacturer' => 'required',
    		'product' => 'required|max:255',
    		'price' => 'required|numeric',
    		'description' => 'required',
    	]);

    	$user->products()->create([
    		'manufacturer' => $request->manufacturer,
    		'product' => $request->product,
    		'price' => $request->price,
    		'description' => $request->description,
    	]);

    	return back();
    }

    // This function will update a product's information
    public function update(Request $request, Product $product)
    {
    	$product->update([
    		'manufacturer' => $request->manufacturer,
    		'product' => $request->product,
    		'price' => $request->price,
    		'description' => $request->description,
    	]);

    	return redirect('/home');
    }
    // This function will delete a product listing
    public function delete(Product $product)
    {
    	$product->delete();
    	return redirect('/home');
    }
}
