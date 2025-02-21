<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Validated;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::latest()->get();
        return view('product.create', compact('categories'));
    }
    
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => 'required|unique:categories,name|string|max:100|min:6',
        //     'status' => 'nullable|boolean',
        // ]);

        $product = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/product', $filename);
            $product->image = $path;
        }
        
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->slug = Str::slug($request->name);
        $product->status = $request->status;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('product.index')->withInput();
    }
    // public function edit($id): View
    // {
    //     $category = Category::findOrFail($id);
    //     return view('category.edit', compact('category'));
    // }
    
    // public function update(Request $request, $id): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => 'required|unique:categories,name|string|max:100|min:6'.$id,
    //         'status' => 'nullable|boolean',
    //     ]);

    //     $category = Category::findOrFail($id);
    //     $category->name = $request->name;
    //     $category->slug = Str::slug($request->name);
    //     $category->status = $request->status;
    //     $category->update();
    //     return redirect()->route('category.index')->withInput();
    // }

    // public function delete($id): RedirectResponse
    // {
    //     $category = Category::findOrFail($id);
    //     $category->delete();
    //     return redirect()->route('category.index');
    // }

    // public function status($id): RedirectResponse
    // {
    //     $category = Category::findOrFail($id);
    //     $category->status = !$category->status;
    //     $category->update();
    //     return redirect()->route('category.index');
    // }
}
