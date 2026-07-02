<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meal;

class VisitorController extends Controller
{
    // 1. Home Page (Index)
    public function index()
    {
        $categories = Category::all();
        // Latest 8 meals fetch kar rahe hain slider/famous section ke liye
        $famous_meals = Meal::latest()->take(8)->get(); 

        return view('visitor.index', compact('categories', 'famous_meals'));
    }

    // 2. Meals Page (Saare pakwan dekhne ke liye)
    public function meals(Request $request)
{
    $categories = Category::all();
    
    // Default: Khali collection taaki shuruat mein sirf categories dikhein
    $meals = collect(); 

    // Agar URL mein category ID hai (e.g. ?category=5)
    if ($request->has('category') && $request->category != '') {
        
        $catId = $request->category;
        
        // Filter: Sirf wahi meals jo selected category ki hain
        $meals = Meal::where('category_id', $catId)->get();

    }

    return view('visitor.meals', compact('meals', 'categories'));
}

    // 3. Meal Details Page (Description dekhne ke liye)
    public function show($id)
    {
        $meal = Meal::findOrFail($id);
        return view('visitor.meal_details', compact('meal'));
    }

    // 4. About Us Page
    public function about()
    {
        return view('visitor.about');
    }

    // 5. Contact Us Page
    public function contact()
    {
        return view('visitor.contact');
    }
}