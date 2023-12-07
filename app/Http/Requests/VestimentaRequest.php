<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VestimentaRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'imagen' => 'required|image|max:204|mimes:jpeg,png,jpg,gif,svg',
            'descripcion' => 'required|string|max:300',
            'precio' => 'required|gt:0|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.string' => 'El nombre tiene que ser una cadena de texto',
            'nombre.max' => 'El nombre puede tener maximo 100 caracteres',

            'imagen.required' => 'La imagen es obligatorio',
            'nombre.image' => 'Tiene que ser un archivo de imagen',

            'descripcion.required' => 'La descripcion es obligatorio',
            'descripcion.string' => 'La descripcion tiene que ser una cadena de texto',
            'descripcion.max' => 'La descripcion puede tener maximo 300 caracteres',

            'precio.required' => 'El precio es obligatorio',
            'precio.gt' => 'El precio tiene que ser mayor a 0',
            'precio.numeric' => 'El precio tiene que ser de tipo numerico',
        ];
    }
}
