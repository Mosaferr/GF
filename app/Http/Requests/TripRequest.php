<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
{
    /*** Determine if the user is authorized to make this request.*/
    public function authorize(): bool
    {
        return true;
    }

    /*** Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array
    {
        $destinationValidation = request()->routeIs('admin.addtrip.store')
        ? 'required|exists:trips,id'            // Dla AddTripController (destination to id)
        : 'required|exists:trips,destination';  // Dla TripDataController (destination to enum)

        return [
            // 'destination' => 'required|exists:trips,id',
            'destination' => $destinationValidation,
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric|min:0',
            'total_seats' => 'required|integer|min:1',
        ];
    }
}
