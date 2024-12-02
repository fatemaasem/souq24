<?php

namespace App\Http\Controllers\Services;

use App\Dtos\Services\CategoryDto;
use App\Helper\DefineLayouts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service\CategoryRequest;
use App\Models\CategoryService;
use App\Models\CategoryStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /*
        get all service category
    */
    public function index(){
        return CategoryService::all();
    }
     /*
        get all categories service as view not api
    */
    public function viewIndex(){
       $categoryService=CategoryService::all();
       
        
        return view('admin.services.category.all',['categoryService'=>$categoryService]);
    }
    /*
    view
    */
    public function view($id){
        // Attempt to find the store  by ID

       $categoryService=CategoryService::find($id);
        // Check if category service  was found
       if(!$categoryService){
            Session::flash('error','This category service not found');
        return redirect()->route('service-categories.all');
        }
        return view("admin.services.category.view",['categoryService'=>$categoryService]);
    }
    /*
    create
    */
    public function create(){
        return view("admin.services.category.create");
    }

     /*
        store new posts category
    */
    

    public function store(CategoryRequest $request){
    
        

        $categoryDto=CategoryDto::create($request);
       
       $category= CategoryService::create(
        $categoryDto
            );
           
           Session::flash('success',"Category service created successfully");
           return redirect()->route("service-categories.all");
       }

       /*
        update category

       */
      public function update(CategoryRequest $request, $id){
        
        $categoryDto=CategoryDto::create($request);
        
        $category=CategoryService::find($id);
         // Check if category was found
         if(!$category){
            return response()->json(['error' => 'This category service not found'], 404);
        }
        $category->update(
           [
            'name_ar'=>$categoryDto['name_ar']??$category['name_ar'],
            'name_en'=>$categoryDto['name_en']??$category['name_en']
           ]
        );
        return response()->json([
            'success' => true,
            'message' => 'service category updated successfully!',
            'data' => $category,
        ], 200); // HTTP 200 OK
      }
      /*
      delete category
      */
      public function destroy  ($id){
        $category=CategoryService::find($id);
        // Check if category was found
        if(!$category){
            return response()->json(['error' => 'This category service not found'], 404);
        }
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!',
        ], 200); // HTTP 200 OK

      }
    /*
        get all services for one category
    */
    
    public function servicesForOneCategory($id){
        // Attempt to find the store  by ID

        $categoryService=CategoryService::find($id);
        // Check if store was found
        if(!$categoryService){
            return response()->json(['error' => 'This category service not found'], 404);
        }
         // Return all templates for this store data as JSON
        return $categoryService->services;
   }

   /*
        get all templates for one category
    */
    public function view_templatesForOneCategory($id){
        // Attempt to find the store  by ID

       $service=CategoryService::find($id);
       // Check if category service  was found
       if(!$service){
            Session::flash('error','This category service not found');
           return redirect()->route('service-categories.all');
       }
        // Return all templates for this store data as JSON
    
       return view('admin.services.category.all-one-category',['services'=>$service->services,'categoryName'=>$service->name_en]);
   }
   /*
   function to delete all
   */
  public function deleteAll(){
   
    try {
        // Fetch all categories to delete their images
       
        $categories = CategoryService::all();
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
        CategoryService::query()->delete();

        // Redirect back with success message
        Session::flash('success', 'All services and their images have been successfully deleted.');
        return redirect()->back();
    } catch (\Exception $e) {
        Session::flash('error', 'An error occurred while deleting categories: ' . $e->getMessage());
        // Redirect back with success message
        return redirect()->route("admin.dashboard");
    }
}

  
}