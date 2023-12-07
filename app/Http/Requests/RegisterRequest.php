<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class RegisterRequest extends FormRequest
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
            'rut' => 'required|string|max:10|unique:users,rut',
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'password' => 'required|string|min:2|max:100',
            'correo' => 'required|string|max:50|unique:users',
            'telefono' => 'required|numeric|digits:9',
            'direccion' => 'required|string|max:50'
            
            
        ];
    }
}
