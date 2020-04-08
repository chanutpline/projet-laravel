<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //l'emplacement nom doit être une string non vide de 255 caractères maximum 
            'nom' => ['required', 'string', 'max:255'],
            //l'emplacement email doit être une adresse mail valide non vide de 255 caractères maximum 
            'email' => ['required', 'string', 'email', 'max:255'],
            //l'emplacement message doit être une string non vide de 2048 caractères maximum 
            'message' => ['required', 'string', 'max:2048'],
        ];
    }
}
