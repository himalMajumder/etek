<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UserAddressRequest extends FormRequest
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
            'name'             => ['required', 'string', 'min:3'],
            'phone'            => ['required', 'string', 'min:3'],
            'address'          => ['required', 'string', 'min:3'],
            'district_id'      => ['required', 'integer', 'min:1'],
            'upazila_id'       => ['required', 'integer', 'min:1'],
            'shipping_address' => ['nullable', 'string'],
            'billing_address'  => ['nullable', 'string'],
        ];
    }

    /**
     * Customize the response for validation errors.
     *
     * @param  Validator  $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {

        if ($this->ajax()) {
            $response = response()->json([
                'success' => false,
                'message' => "Validation error",
                'errors'  => $validator->errors(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $response = redirect()->back()->withErrors($validator)->withInput();
        }

        throw new HttpResponseException($response);

    }

}
