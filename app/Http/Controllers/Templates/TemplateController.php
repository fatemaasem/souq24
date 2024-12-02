<?php

namespace App\Http\Controllers\Templates;

use App\Dtos\Templates\TemplateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Template\TemplateRequest;
use App\Models\CategoryStore;
use App\Models\Service;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    
   /*
   get all posts
   */
  public function index(){
    return Template::all();
  }
/*
show one post
*/
   public function show($id){
        // Attempt to find the post  by ID

        $template=Template::find($id);
        // Check if category was found
        if(!$template){
            return response()->json(['error' => 'This template not found'], 404);
        }
         // Return all posts for this category data as JSON
        return $template;
   }
   /*
   create function
   */
  public function create(){
    return view('admin.stores.template.create');
  }
   /*
   store post
   */
   public function store(TemplateRequest $request){
   $templateDto=TemplateDto::create($request);

   $templateDto['image'] = $templateDto['image']->store('templates', 'public');
   $template=Template::create($templateDto);
   
   Session('success','service added successfully!');
   return redirect()->route('admin.dashboard');
   }
   /*
   update Post
   */
  public function update(TemplateRequest $request,$id){
    
    $templateDto=TemplateDto::create($request);
  
    $template=Template::findOrFail($id);
    if(!$template){
        return response()->json(['error' => 'This service not found'], 404);
    }
    $imageName=$template['image'];
  
    if($templateDto['image']){
        $imageName = $templateDto['image']->store('templates', 'public');
        Storage::disk('public')->delete($template->image);
    }
    
    $template->update([
       
        'desc_ar'=>$templateDto['desc_ar']??$template->desc_ar,
        'desc_en'=>$templateDto['desc_en']??$template->desc_en,
        'image'=>$imageName,
        'categoryStore_id'=>$templateDto['categoryStore']??$template->categoryStore_id
    ]);
   
    return response()->json([
        'success' => true,
        'message' => 'service updated successfully!',
        'data' => $template,
    ], 200); // HTTP 200 OK
  }
  /*
  delete poost
  */
  public function destroy($id){
   
    $template=Template::findOrFail($id);

   
    if(!$template){
      Session::flash('error','templatenot deleted ,this not found');
    }
    $image=$template->image;
    $template->delete();
    Storage::disk('public')->delete($image);
    Session::flash('success','template deleted successfully!');
   return redirect()->route('admin.dashboard');
  }
  /*
  delete all
  */


public function deleteTemplatesForCategory($categoryId)
{
    // Find the category by ID
    $category = CategoryStore::find($categoryId);

    if (!$category) {
      Session::flash('error','Category not found');
       
    }
    else{
      // Delete all templates associated with this category
      $categoryIcon=$category->icon;
      
      $category->templates()->delete();
      Storage::disk('public')->delete($categoryIcon);
      Session::flash('success','Category deleted successfully');
    }

    

    return redirect()->route('templates.one.category',$categoryId);
}


}
