<?php

namespace App\Http\Requests\Post;

use App\Rules\ArabicOnly;
use App\Rules\EnglishOnly;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules=[];
        if ($this->isMethod('put') || $this->isMethod('patch')) {
           
            // Additional rules specific to update (PUT or PATCH) request
           
           $rules = [
            'title_ar' => ['sometimes','required', 'string', 'max:255',new ArabicOnly],        // Arabic title, required, max length 255
            'title_en' => ['sometimes','required', 'string', 'max:255',new EnglishOnly],        // English title, required, max length 255
            'desc_ar' => ['sometimes','required', 'string',new ArabicOnly],                    // Arabic description, required
            'desc_en' => ['sometimes','required', 'string',new EnglishOnly],                    // English description, required
            'image' => ['sometimes','required', 'image', 'max:2048'],           // Optional image, max size 2MB
            'categoryPost_id' => ['sometimes','required', 'exists:category_posts,id'] // Must exist in category_posts table
             ];
        }
        else{
         // Common rules for both store and update
         $rules = [
            'title_ar' => ['required', 'string', 'max:255',new ArabicOnly],        // Arabic title, required, max length 255
            'title_en' => ['required', 'string', 'max:255',new EnglishOnly],        // English title, required, max length 255
            'desc_ar' => ['required', 'string',new ArabicOnly],                    // Arabic description, required
            'desc_en' => ['required', 'string',new EnglishOnly],                    // English description, required
            'image' => ['required', 'image', 'max:2048'],           // Optional image, max size 2MB
            'categoryPost_id' => ['required', 'exists:category_posts,id'] // Must exist in category_posts table
        ];
    }
    return $rules;
    }
}
