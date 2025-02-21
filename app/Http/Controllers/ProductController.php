<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'total_sold_quantity' => 'required|integer|min:0',
        ]);

        // Save data to the database
        Product::create([
            'name' => $request->name,
            'type' => $request->type,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'total_sold_quantity' => $request->total_sold_quantity,
        ]);

        return back()->with('success', 'Product added successfully!');
    }


    public function filterByType($type)
    {
        $products = Product::where('type', $type)->get();
        return response()->json($products);
    }


    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));  // Loads index.blade.php inside app.blade.php
        // return view('products.index');
    }
}
