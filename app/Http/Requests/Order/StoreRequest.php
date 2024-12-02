<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            
            'name' => 'required|string|max:255', // Name is required, must be a string, and max 255 characters
            'email' => 'required|email|unique:users,email', // Valid email, unique in the users table
            'phone' => [
                'required',
                'regex:/^(010|012|015|011)[0-9]{8}$/', // Match 010, 012, 015, or 011 followed by 8 digits
                'unique:store_orders,phone' // Ensure phone is unique
            ],
            'store_name_ar' => 'nullable|string|max:255', // Optional Arabic store name, max 255 characters
            'store_name_en' => 'nullable|string|max:255', // Optional English store name, max 255 characters
            'categoryStore_id' => 'required|exists:category_stores,id', // Ensure ID exists in category_stores table
            'status' => 'nullable|in:pending,completed', // Status must be pending or completed
        ];
    }
   
    public function messages(): array
    {
        return [
            'name.required' => ['ar' => 'الاسم مطلوب.', 'en' => 'The name field is required.'],
            'name.string' => ['ar' => 'يجب أن يكون الاسم نصًا.', 'en' => 'The name must be a string.'],
            'name.max' => ['ar' => 'يجب ألا يتجاوز الاسم 255 حرفًا.', 'en' => 'The name may not be greater than 255 characters.'],

            'email.required' => ['ar' => 'البريد الإلكتروني مطلوب.', 'en' => 'The email field is required.'],
            'email.email' => ['ar' => 'يجب أن يكون البريد الإلكتروني صالحًا.', 'en' => 'The email must be a valid email address.'],
            'email.unique' => ['ar' => 'هذا البريد الإلكتروني مستخدم بالفعل.', 'en' => 'The email has already been taken.'],

            'phone.required' => ['ar' => 'رقم الهاتف مطلوب.', 'en' => 'The phone number is required.'],
            'phone.regex' => ['ar' => 'يجب أن يكون رقم الهاتف صالحًا.', 'en' => 'The phone number format is invalid.'],
            'phone.unique' => ['ar' => 'رقم الهاتف مستخدم بالفعل.', 'en' => 'The phone number has already been taken.'],

            'store_name_ar.string' => ['ar' => 'يجب أن يكون اسم المتجر باللغة العربية نصًا.', 'en' => 'The Arabic store name must be a string.'],
            'store_name_ar.max' => ['ar' => 'يجب ألا يتجاوز اسم المتجر باللغة العربية 255 حرفًا.', 'en' => 'The Arabic store name may not exceed 255 characters.'],

            'store_name_en.string' => ['ar' => 'يجب أن يكون اسم المتجر باللغة الإنجليزية نصًا.', 'en' => 'The English store name must be a string.'],
            'store_name_en.max' => ['ar' => 'يجب ألا يتجاوز اسم المتجر باللغة الإنجليزية 255 حرفًا.', 'en' => 'The English store name may not exceed 255 characters.'],

            'categoryStore_id.exists' => ['ar' => 'القسم المحدد غير موجود.', 'en' => 'The selected category store ID does not exist.'],
            'categoryStore_id.required' => ['ar' => 'يجب اختيار نوع القالب.', 'en' => 'The category template field is required.'],

            'status.in' => ['ar' => 'يجب أن تكون الحالة إما قيد الانتظار أو مكتملة.', 'en' => 'The status must be either pending or completed.'],
           
        ];
    }
}
