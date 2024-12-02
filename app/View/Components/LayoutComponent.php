<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LayoutComponent extends Component

{  public $storeCategories;
    public $categoryServices;
    public $title;
    public $categoryPosts;
    /**
     * Create a new component instance.
     */
    public function __construct($storeCategories,$categoryServices,$title,$categoryPosts)
    {
    
        $this->storeCategories=$storeCategories;
        $this->title=$title;
        $this->categoryServices=$categoryServices;
        $this->categoryPosts=$categoryPosts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    { 
        return view('components.layout-component');
    }
}
