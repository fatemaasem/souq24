<?php

namespace App\Http\Controllers\Templates;

use App\Dtos\Templates\CategoryDto;
use App\Helper\DefineLayouts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Template\CategoryRequest;
use App\Models\CategoryStore;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /*
        get all categories
    */

    public function index(){
        
        return CategoryStore::all();
    }
     /*
        get all categories as view not api
    */
    public function viewIndex(){
        $categories=DefineLayouts::getCategories();
        
        return view('admin.stores.category.all',$categories);
    }
    /*
    view one category
    */
    public function view($id){
        $category= CategoryStore::find($id);
        if(!$category){
            Session::flash('error','This category not found');
            return redirect()->route('admin.dashboard');
        }
        return view('admin.stores.category.view',['categoryStore'=>$category]);

    }
/*
function to return create form of category store
*/

public function create(){
    return view("admin.stores.category.create",DefineLayouts::getCategories());
}

    /*
        get all categories Template and return view 
    */

    public function store(CategoryRequest $request){
    
        

        $categoryDto=CategoryDto::create($request);
       
      
      
       $category= CategoryStore::create(
        $categoryDto
            );
            Session::flash('success','Category store added successfully');
        return redirect()->route('store-categories.all');
       }

       /*
        update category

       */
      public function update(CategoryRequest $request, $id){
        
       
        
        $category=CategoryStore::find($id);
        $categoryDto=CategoryDto::create($request,$category);
         // Check if category was found
         if(!$category){
            return response()->json(['error' => 'This category template not found'], 404);
        }
        $category->update(
           [
            'name_ar'=>$categoryDto['name_ar']??$category['name_ar'],
            'name_en'=>$categoryDto['name_en']??$category['name_en'],
           ]
        );
        return response()->json([
            'success' => true,
            'message' => 'template category updated successfully!',
            'data' => $category,
        ], 200); // HTTP 200 OK
      }
      /*
      delete category
      */
      public function destroy  ($id){
        $category=CategoryStore::find($id);
        // Check if category was found
        if(!$category){
            return response()->json(['error' => 'This store category  not found'], 404);
        }
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!',
        ], 200); // HTTP 200 OK

      }

    /*
        get all templates for one category
    */
    public function templatesForOneCategory($id){
         // Attempt to find the store  by ID

        $store=CategoryStore::find($id);
        // Check if store was found
        if(!$store){
            return response()->json(['error' => 'This category not found'], 404);
        }
         // Return all templates for this store data as JSON
        return $store->templates;
    }

     /*
        get all templates for one category
    */
    public function view_templatesForOneCategory($id){
        // Attempt to find the store  by ID

       $store=CategoryStore::find($id);
       // Check if store was found
       if(!$store){
            Session::flash('error','This category not found');
           return redirect()->route('admin.dashboard');
       }
        // Return all templates for this store data as JSON
    
       return view('admin.stores.category.all-one-category',['templates'=>$store->templates,'categoryName'=>$store->name_en]);
   }
   /*
   function to delete all
   */
  public function deleteAll(){
   
    try {
        // Fetch all categories to delete their images
       
        $categories = CategoryStore::all();
       if($categories->isEmpty()){
        return redirect()->back()->with('error','Not found category to deleted');
       }

        // Loop through each category and delete its image
        foreach ($categories as $category) {
            if ($category->icon) {
                Storage::disk('public')->delete($category->icon); // Delete the image file from storage
            }
        }

        // Delete all categories
        CategoryStore::query()->delete();

        // Redirect back with success message
        Session::flash('success', 'All Store and their images have been successfully deleted.');
        return redirect()->back();
    } catch (\Exception $e) {
        Session::flash('error', 'An error occurred while deleting categories: ' . $e->getMessage());
        // Redirect back with success message
        return redirect()->route("admin.dashboard");
    }
}

}
