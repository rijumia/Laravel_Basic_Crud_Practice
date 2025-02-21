<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Validated;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    // public function create(): View
    // {
    //     return view('category.create');
    // }
    
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => 'required|unique:categories,name|string|max:100|min:6',
    //         'status' => 'nullable|boolean',
    //     ]);

    //     $category = new Category();
    //     $category->name = $request->name;
    //     $category->slug = Str::slug($request->name);
    //     $category->status = $request->status;
    //     $category->save();
    //     return redirect()->route('category.index')->withInput();
    // }
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
