<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
{
    /*** Determine if the user is authorized to make this request. */
    public function authorize(): bool
    {
        return true;
    }

    /*** Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string> */
    public function rules(): array
    {
        return [
            'participants.*.name' => 'required|string|alpha|min:3|max:20',
            'participants.*.middle_name' => 'nullable|string|alpha|min:3|max:20',
            'participants.*.last_name' => 'required|string|alpha|min:2|max:50',
            'participants.*.phone' => 'nullable|regex:/^\+?[0-9\s]+$/|min:8|max:20',
            'participants.*.email' => 'required|email|max:50',
            'participants.*.birth_date' => 'required|date',
            // 'participants.*.birth_date' => 'required|date|before_or_equal:'.now()->subYears(2),
            'participants.*.pesel' => 'required|string|digits:11|unique:participants,pesel',
            'participants.*.citizenship' => 'required|string',
            // 'participants.*.gender' => 'nullable|string',
            'participants.*.passport_number' => 'required|string|regex:/^[a-zA-Z0-9]{7,10}$/|unique:participants,passport_number',
            'participants.*.issue_date' => 'required|date|before_or_equal:today',
            'participants.*.expiry_date' => 'required|date|after:today',
            // 'participants.*.expiry_date' => 'required|date|after:today|after_or_equal:'.now()->addMonths(3),
            'participants.*.street' => 'required|string|max:100',
            'participants.*.house_number' => 'required|string|max:10',
            'participants.*.apartment_number' => 'nullable|string|max:10',
            'participants.*.postal_code' => 'required|string|max:20',
            'participants.*.city_name' => 'required|string|alpha|min:2|max:100',
        ];
    }
}
