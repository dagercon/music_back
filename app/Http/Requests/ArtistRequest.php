<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $name_validation = 'required|unique:artists|min:3|max:120';

        if ($this->method() == "PUT" || $this->method() == "PATCH") {
            $name_validation = 'required|min:3|max:120|unique:artists,name,'.$this->artist;
        }
        return [
            'name' => $name_validation,
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Debe indicar el nombre',
            'name.unique' => 'El nomvre indicado ya fue registrado',
            'name.min' => 'El atributo debe tener almenos 3 caracteres',
            'name.max' => 'El atributo no debe ser mayor que 120 caracteres'
            ];
       }
}
