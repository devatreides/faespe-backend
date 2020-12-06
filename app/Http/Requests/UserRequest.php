<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    protected function prepareForValidation()
    {
        if(!$this->id){
            $this->merge([
                'givenID' => 0
            ]);
        }else{
            $this->merge([
                'givenID' => $this->id
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request()->isMethod('put')){
            return [
                'name' => 'required|min:5|max:255',
                'email' => 'required|email|unique:users,email,'.$this->givenID.',id',
                'is_admin' => 'nullable',
            ];
        }

        return [
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
            'is_admin' => 'nullable',
            'password' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
