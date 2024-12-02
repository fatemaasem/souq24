<?php
namespace App\Helper;

use App\Models\CategoryPost;
use App\Models\CategoryService;
use App\Models\CategoryStore;

class DefineLayouts{

 //get all gategory stores and category service and category posts besause we use them in layout

 public static function getCategories(){
    $storeCategories=CategoryStore::with('templates')->get();
    $categoryServices=CategoryService::with('services')->get();
    $categoryPosts=CategoryPost::with('posts')->get();
   
    return ['storeCategories'=>$storeCategories,'categoryServices'=>$categoryServices,'categoryPosts'=>$categoryPosts];
  }
}