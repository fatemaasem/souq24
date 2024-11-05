<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allCategories(){
        return CategoryPost::all();
    }

    public function postsForOneCategory($id){
        // Attempt to find the post category by ID

        $categoryPost=CategoryPost::find($id);
        // Check if category was found
        if(!$categoryPost){
            return response()->json(['error' => 'This category post not found'], 404);
        }
         // Return all posts for this category data as JSON
         $posts= $categoryPost->posts;
         $posts->makeHidden(['desc_ar', 'desc_en']);
        return  $posts;
   }

   public function showPost($id){
        // Attempt to find the post  by ID

        $post=Post::find($id);
        // Check if category was found
        if(!$post){
            return response()->json(['error' => 'This post not found'], 404);
        }
         // Return all posts for this category data as JSON
        return $post;
   }
}
