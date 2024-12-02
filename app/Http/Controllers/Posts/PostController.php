<?php

namespace App\Http\Controllers\Posts;

use App\Dtos\Posts\PostDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    

   /*
   get all posts
   */
  public function index(){
    return Post::all();
  }
/*
show one post
*/
   public function show($id){
        // Attempt to find the post  by ID

        $post=Post::find($id);
        // Check if category was found
        if(!$post){
            return response()->json(['error' => 'This post not found'], 404);
        }
         // Return all posts for this category data as JSON
        return $post;
   }
   /*
   store post
   */
   public function store(PostRequest $request){
   $postDto=PostDto::create($request);

   $postDto['image'] = $postDto['image']->store('posts', 'public');
   $post=Post::create($postDto);
   return [
    'success' => true,
    'message' => 'Post added successfully!',
    'data' => $post,
   ];
   }
   /*
   update Post
   */
  public function update(PostRequest $request,$id){
    
    $postDto=PostDto::create($request);
  
    $post=Post::findOrFail($id);
    if(!$post){
        return response()->json(['error' => 'This post not found'], 404);
    }
    $imageName=$post['image'];
  
    if($postDto['image']){
        $imageName = $postDto['image']->store('posts', 'public');
        Storage::disk('public')->delete($post->image);
    }
    
    $post->update([
        'title_ar'=>$postDto['title_ar']??$post->title_ar,
        'title_en'=>$postDto['title_en']??$post->title_en,
        'desc_ar'=>$postDto['desc_ar']??$post->desc_ar,
        'desc_en'=>$postDto['desc_en']??$post->desc_en,
        'image'=>$imageName,
        'categoryPost_id'=>$postDto['categoryPost_id']??$post->categoryPost_id
    ]);
   
    return response()->json([
        'success' => true,
        'message' => 'Post updated successfully!',
        'data' => $post,
    ], 200); // HTTP 200 OK
  }
  /*
  delete poost
  */
  public function destroy($id){
    $post=Post::findOrFail($id);
    if(!$post){
        return response()->json(['error' => 'This post not found'], 404);
    }
    $image=$post->image;
    $post->delete();
    Storage::disk('public')->delete($image);
    return response()->json([
        'success' => true,
        'message' => 'Post deleted successfully!',
        
    ], 200); // HTTP 200 OK
  }

   
}
