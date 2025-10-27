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
            'description' => 'required|string|min:20',
            'category' => 'required|string|max:100',
            'dusun' => 'required|string|in:Dusun I,Dusun II,Dusun III,Dusun IV,Dusun V',
            'is_public' => 'sometimes|boolean',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => $type === 'pengaduan' ? 'required|string|max:255' : 'nullable|string|max:255',
        ];

        return $rules;
    }
    
    public function messages()
    {
        return [
            'type.required' => 'Silakan pilih jenis laporan',
            'type.in' => 'Jenis laporan tidak valid',
            'title.required' => 'Judul laporan harus diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'description.required' => 'Deskripsi harus diisi',
            'description.min' => 'Deskripsi minimal 20 karakter',
            'category.required' => 'Silakan pilih kategori',
            'category.max' => 'Kategori maksimal 100 karakter',
            'dusun.required' => 'Silakan pilih dusun',
            'dusun.in' => 'Pilihan dusun tidak tersedia',
            'location.required' => 'Lokasi harus diisi',
            'location.max' => 'Lokasi maksimal 255 karakter',
            'image_path.required' => 'Harap unggah gambar bukti',
            'image_path.image' => 'File harus berupa gambar (jpeg, png, jpg, gif)',
            'image_path.mimes' => 'Format file harus: jpeg, png, jpg, atau gif',
            'image_path.max' => 'Ukuran file maksimal 2MB',
        ];
    }

}
