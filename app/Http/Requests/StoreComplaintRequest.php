<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all authenticated users
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $type = $this->input('type', 'pengaduan');
        
        $rules = [
            'type' => 'required|in:pengaduan,aspirasi',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'is_public' => 'sometimes|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => $type === 'pengaduan' ? 'required|string|max:255' : 'nullable',
        ];

        return $rules;
    }
    
    public function messages()
    {
        return [
            'location.required' => 'Lokasi kejadian wajib diisi untuk pengaduan',
            'title.required' => 'Judul wajib diisi',
            'description.required' => 'Deskripsi wajib diisi',
            'category.required' => 'Kategori wajib dipilih',
        ];
    }
    
    protected function prepareForValidation()
    {
        if ($this->type === 'pengaduan') {
            $this->merge(['suggestion' => null]);
        }
    }
}
