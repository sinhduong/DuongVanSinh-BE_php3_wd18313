<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $view;

    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        $this->view['listPro'] = Product::paginate(10);

        $objCate = new Category();
        $listCate = $objCate->loadAllCate();
        $arrayCate = [];
        foreach ($listCate as $value) {
            $arrayCate[$value->id] = $value->name;
        }
        $this->view['listCate'] = $arrayCate;

        return view('product.index', $this->view);
    }

    public function create()
    {
        $objCate = new Category();
        $listCate = $objCate->loadAllCate();
        $this->view['categories'] = $listCate;
        return view('product.create', $this->view);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
