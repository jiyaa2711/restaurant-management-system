<?php

namespace App\Http\Controllers;

use App\Models\Meal; 
use App\Models\Category;
use Illuminate\Http\Request;
use File; 

class MealController extends Controller
{
    public function index() {
        $meals = Meal::with('category')->get();
        return view('admin.meals.index', compact('meals'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.meals.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'category_id', 'price', 'description']);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/meals'), $imageName);
            $data['image'] = $imageName;
        }

        Meal::create($data);

        return redirect()->route('admin.meals.index')->with('success', 'New Meal added successfully!');
    }

    public function edit($id) {
        $meal = Meal::findOrFail($id);
        $categories = Category::all();
        return view('admin.meals.edit', compact('meal', 'categories'));
    }

    public function update(Request $request, $id) {
        $meal = Meal::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
            'image'       => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'category_id', 'price', 'description']);

        if ($request->hasFile('image')) {
            if ($meal->image) {
                $oldImagePath = public_path('images/meals/' . $meal->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/meals'), $imageName);
            $data['image'] = $imageName;
        }

        $meal->update($data);

        return redirect()->route('admin.meals.index')->with('success', 'Meal updated successfully!');
    }

    public function delete($id) {
        $meal = Meal::findOrFail($id);

        if ($meal->image) {
            $imagePath = public_path('images/meals/' . $meal->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $meal->delete();

        return redirect()->route('admin.meals.index')->with('success', 'Meal deleted successfully!');
    }
}