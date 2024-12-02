<?php

namespace App\Http\Controllers\Posts;

use App\Dtos\Posts\CategoryDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CategoryRequest;
use App\Models\CategoryPost;
use App\Rules\ArabicOnly;
use App\Rules\EnglishOnly;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /*
        return all posts category
    */
    public function index(){
        return CategoryPost::all();
    }

    /*
        store new posts category
    */
    

    public function store(CategoryRequest $request){
    
        

        $categoryDto=CategoryDto::create($request);
       
       $category= CategoryPost::create(
        $categoryDto
            );
           return [
                'success' => true,
                'message' => 'Post category created successfully!',
                'data' => $category
           ];
       }
       /*
       get one category
       */

       public function show ($id){
        
        return CategoryPost::findOrFail($id);
       }
       /*
        update category

       */
      public function update(CategoryRequest $request, $id){
        
        $categoryDto=CategoryDto::create($request);
        
        $category=CategoryPost::findOrFail($id);
        $category->update(
           [
            'name_ar'=>$categoryDto['name_ar']??$category['name_ar'],
            'name_en'=>$categoryDto['name_en']??$category['name_en']
           ]
        );
        return response()->json([
            'success' => true,
            'message' => 'Post category updated successfully!',
            'data' => $category,
        ], 200); // HTTP 200 OK
      }
      /*
      delete category
      */
      public function destroy  ($id){
        $category=CategoryPost::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully!',
        ], 200); // HTTP 200 OK

      }

        /*
            get posts for one category

        */
            
       public function postsForOneCategory($id){
        // Attempt to find the post category by ID

        $categoryPost=CategoryPost::find($id);
        // Check if category was found
        if(!$categoryPost){
            return response()->json(['error' => 'This category post not found'], 404);
        }
         // Return all posts for this category data as JSON
         $posts= $categoryPost->posts;
         //$posts->makeHidden(['desc_ar', 'desc_en']);
        return  $posts;
   }

}