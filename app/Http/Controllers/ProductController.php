<?php
namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Product_image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('admin.products.index', compact('products'))
            ->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Category::all();

        return view('admin.products.create', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required', 
            'name' => 'required', 
            'price' => 'required', 
            'stock' => 'required', 
            'size' => 'required', 
            'size' => 'required', 
            'desc' => 'required', 
        ]);

        $insert = Product::create($request->all());

        if ($request->hasFile('image'))
        {

            foreach ($request->file('image') as $image)
            {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/product_image/', $name);

                $insert_image = Product_image::create(['product_id' => $insert->id, 'image' => $name]);
            }
        }

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        $category = Category::all();
        $products = Product::find($request->id);

        return view('admin.products.edit', compact('products', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'slug' => 'required', 
            'name' => 'required', 
            'price' => 'required', 
            'stock' => 'required', 
            'size' => 'required', 
            'size' => 'required', 
            'desc' => 'required', 
        ]);

        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
