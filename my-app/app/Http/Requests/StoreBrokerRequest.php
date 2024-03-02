<?php

namespace App\Http\Requests;
//
use Illuminate\Foundation\Http\FormRequest;

/**
 * StoreBrokerRequest
 */
class StoreBrokerRequest extends FormRequest
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
            'name'=>$this->isPostRequest().'|unique:brokers|max:255',
            'address'=>$this->isPostRequest().'|max:255',
            'city'=>$this->isPostRequest().'|max:255',
            'zip_code'=>$this->isPostRequest().'|numeric',
            'phone_number'=>$this->isPostRequest().'|numeric',
            'logo_path'=>$this->isPostRequest(),
        ];
    }

    /**
     * isPostRequest
     *
     * @return string
     */
    private function isPostRequest():string
    {
        return request()->isMethod('post') ? 'required' : 'sometimes';
    }
}