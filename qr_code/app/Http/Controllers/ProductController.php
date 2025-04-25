<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
        ]);
    
        Product::create($request->only('name','description','price'));
    
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $product = Product::findOrFail($id);
         $qrCode = QrCode::size(200)->generate(route('products.show', $id));

         // Pass the product and QR code to the view
         return view('show', compact('product', 'qrCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price'       => 'required|decimal:8,2',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only('name','description','price'));

        return redirect()->route('products.index')
                         ->with('success','Product updated successfully');
    }


    public function destroy($id){
          // Find the product by ID and delete it
          $product = Product::findOrFail($id);
          $product->delete();
          return redirect()->route('products.index')->with('success','Product deleted');
    }



    
}
