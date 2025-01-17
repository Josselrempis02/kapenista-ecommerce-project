<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Show Category List
    public function categoryList(){
        $categories = CategoryModel::all();
        return view('admin.category', compact('categories'));
    }

    // Add Category 
    public function addCategory(Request $request) {
        // Validate the category input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:category',  // Ensure unique slug
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);

        // Create new category
        $category = new CategoryModel;
        $category->name = $request->name;
        $category->slug = $request->slug ?: Str::slug($request->name, '-');  
        $category->description = $request->description;
        $category->keywords = $request->keywords;

        // Save the category to the database
        $category->save();

        // Return with success message
        return back()->with('success', "Category Successfully Created");
    }

    //Edit Category 
    
    public function updateCategory(Request $request, $id)
    {
        // Find the category by its ID, or return a 404 error if not found
        $category = CategoryModel::findOrFail($id);
        
        // Validate the input (optional but recommended)
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'keywords' => 'nullable|string',
        ]);
        
        // Update the category fields
        $category->name = $request->name;
        $category->slug = $request->slug ?: \Str::slug($request->name, '-');  // Auto-generate slug if not provided
        $category->title = $request->title;
        $category->description = $request->description;
        $category->keywords = $request->keywords;
    
        // Save the updated category
        $category->save();
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category updated successfully');
    }
    
    
     //Delete single category
   public function destroyCategory($id)
   {
    $category = CategoryModel::findOrFail($id);
       $category->delete();

       return redirect()->back()->with('success', 'Category deleted successfully');
   }
    
}
