<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Realizar_Reserva_Request extends FormRequest
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
            'nombre' => 'required|min:5|max:25',
            'telefono' => 'required|digits:9',
            'num_comensales' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'observaciones' => 'max:150',
        ];
    }
}
