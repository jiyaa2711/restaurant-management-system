<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:300000',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
        }

        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/categories/' . $category->image);
            if ($category->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }
            
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
        }

        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        $imagePath = public_path('images/categories/' . $category->image);
        if ($category->image && File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}