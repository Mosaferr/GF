<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /*** Determine if the user is authorized to make this request. */
    public function authorize(): bool
    {
        return true;
    }

    /*** Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>  */
    public function rules(): array
    {
        return [
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:10',
            'apartment_number' => 'nullable|string|max:10',
            'postal_code' => 'required|string|max:10',
            'city_id' => 'required_without:city_name|exists:cities,id',
            'city_name' => 'required_without:city_id|string|alpha|min:2|max:100',
        ];
    }
}
