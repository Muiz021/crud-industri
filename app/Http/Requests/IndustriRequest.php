<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustriRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => "nama tidak boleh kosong",
            'deskripsi.required' => "deskripsi tidak boleh kosong",
            'gambar.required' => "gambar tidak boleh kosong",
            'gambar.image' => "file harus gambar",
            'gambar.max' => "file tidak boleh lebih dari 2mb",
        ];
    }
}
