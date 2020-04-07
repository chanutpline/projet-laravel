<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //l'emplacement nom doit être une string non vide de 255 caractère maximum 
            'id'=> ['string', 'required', 'exists:posts,id']
        ];
    }
}