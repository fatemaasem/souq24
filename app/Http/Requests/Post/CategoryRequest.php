<?php

namespace App\Http\Requests\Post;

use App\Rules\ArabicOnly;
use App\Rules\EnglishOnly;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name_ar'=>['sometimes','required','string',new ArabicOnly],
                 'name_en'=>['sometimes','required','string',new EnglishOnly],
             ];
        }
        else{
         // Common rules for both store and update
         $rules = [
           'name_ar'=>['required','string',new ArabicOnly],
            'name_en'=>['required','string',new EnglishOnly],
        ];
    }
    return $rules;

       
       
    }
}
