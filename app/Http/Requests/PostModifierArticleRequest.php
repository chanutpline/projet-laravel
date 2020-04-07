<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostModifierArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //l'emplacement nom doit être une string de lettres majuscules et minuscules non vide, n'étant pas déjà présent dans la database et de 20 caractère maximum 
            'post_name' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z]+$/', 'exists:posts,post_name'],
            //l'emplacement titre doit être une string non vide de 255 caractère maximum 
            'post_title' => ['required', 'string', 'max:255'],
            //l'emplacement article doit être une string non vide de 2048 caractère maximum 
            'post_content' => ['required', 'string', 'max:2048'],
            //l'emplacement status doit être une string non vide de 255 caractère maximum 
            'post_status' => ['required', 'string', 'max:255'],
            //l'emplacement categorie doit être une string non vide de 255 caractère maximum 
            'post_category' => ['required', 'string', 'max:255']
        ];
    }
}