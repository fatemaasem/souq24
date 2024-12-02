<?php
namespace App\Dtos\Posts;

class PostDto
{
    /**
     * Create a DTO array from request data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function create($request): array
    {
        return [
            'title_ar' => $request->title_ar??null,
            'title_en' => $request->title_en??null,
            'desc_ar' => $request->desc_ar??null,
            'desc_en' => $request->desc_en??null,
            'image' => $request->image??null,
            'categoryPost_id' => $request->categoryPost_id??null,
        ];
    }
}
