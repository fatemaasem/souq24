<?php

namespace App\Http\Controllers\Services;

use App\Dtos\Services\ServiceDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
   

   /*
   get all posts
   */
  public function index(){
    return Service::all();
  }
/*
show one post
*/
   public function show($id){
        // Attempt to find the post  by ID

        $service=Service::find($id);
        // Check if category was found
        if(!$service){
            return response()->json(['error' => 'This service not found'], 404);
        }
         // Return all posts for this category data as JSON
        return $service;
   }
   /*
   create service
   */
  public function create(){
    return view("admin.services.service.create");
  }
   /*
   store post
   */
   public function store(ServiceRequest $request){
    
   $serviceDto=ServiceDto::create($request);

   $serviceDto['image'] = $serviceDto['image']->store('services', 'public');
   $service=Service::create($serviceDto);
   
   Session::flash("success",'service added successfully!');
   return redirect()->route("admin.dashboard");
   }
   /*
   update Post
   */
  public function update(ServiceRequest $request,$id){
    
    $serviceDto=ServiceDto::create($request);
  
    $service=Service::findOrFail($id);
    if(!$service){
        return response()->json(['error' => 'This service not found'], 404);
    }
    $imageName=$service['image'];
  
    if($serviceDto['image']){
        $imageName = $serviceDto['image']->store('services', 'public');
        Storage::disk('public')->delete($service->image);
    }
    
    $service->update([
        'title_ar'=>$serviceDto['title_ar']??$service->title_ar,
        'title_en'=>$serviceDto['title_en']??$service->title_en,
        'desc_ar'=>$serviceDto['desc_ar']??$service->desc_ar,
        'desc_en'=>$pserviceDto['desc_en']??$service->desc_en,
        'image'=>$imageName,
        'categoryService_id'=>$postDto['categoryService']??$service->categoryService_id
    ]);
   
    return response()->json([
        'success' => true,
        'message' => 'service updated successfully!',
        'data' => $service,
    ], 200); // HTTP 200 OK
  }
  /*
  delete poost
  */
  public function destroy($id){
    $service=Service::findOrFail($id);
    if(!$service){
      Session::flash('error','Service not found');}
    $image=$service->image;
    $service->delete();
    Storage::disk('public')->delete($image);
    Session::flash('success','The service deleted successfully!');
    return redirect()->route('admin.dashboard');
  }

  /*
   function to delete all
   */
  public function deleteAll(){
   
    try {
        // Fetch all categories to delete their images
        $services = Service::all();

        // Loop through each category and delete its image
        foreach ($services as $service) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image); // Delete the image file from storage
            }
        }

        // Delete all categories
        Service::query()->delete();
        Session::flash('success', 'All services and their images have been successfully deleted.');
        // Redirect back with success message
        return redirect()->route("admin.dashboard");
    } catch (\Exception $e) {
       
        Session::flash('error', 'An error occurred while deleting categories: ' . $e->getMessage());
        // Redirect back with success message
        return redirect()->route("admin.dashboard");
    }
}

}
