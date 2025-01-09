<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /** Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return false;    // metoda authorize() decyduje, czy użytkownik ma prawo wykonywać zapytanie. Jeśli zwraca false, blokuje każde zapytanie i powoduje błąd 403.
    }

    /** Get the validation rules that apply to the request.
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'name' => 'required|string|alpha|min:3|max:20',
			'middle_name' => 'nullable|string|alpha|min:3|max:20',
			'last_name' => 'required|string|alpha|min:2|max:50',
			'phone' => 'nullable|regex:/^\+?[0-9\s]+$/|min:8|max:20',
            'email' => 'required|email|max:50|unique:clients,email,' . $this->client,
			// 'birth_date' => 'required|date|before_or_equal:'.now()->subYears(2),
			'birth_date' => 'required|date',
			// 'pesel' => 'required|string|digits:11|unique:participants,pesel',
			'pesel' => 'required|string',
            // 'pesel' => 'required|string|size:11|unique:clients,pesel,' . $this->client,
            'citizenship_id' => 'required|integer|exists:citizenships,id',
			//'citizenship' => 'required|string',
			// 'gender' => 'nullable|string',
			// 'passport_number' => 'required|string|regex:/^[a-zA-Z0-9]{7,10}$/|unique:participants,passport_number',
			'passport_number' => 'required|string',
			'issue_date' => 'required|date|before_or_equal:today',
			// 'expiry_date' => 'required|date|after:today|after_or_equal:'.now()->addMonths(3),
			'expiry_date' => 'required|date|after:today',
            'street' => 'required|string|max:100',
            'house_number' => 'required|string|max:10',
            'apartment_number' => 'nullable|string|max:10',
			'postal_code' => 'required|string|max:20',
			'city_name' => 'required|string|alpha|min:2|max:100',
            'trip' => 'required|integer|exists:trips,id',
            'start_date' => 'required|integer|exists:dates,id',
            'stage' => 'required|string|in:zarezerwowany,zapisany,przedpłacone,opłacone',
        ];
    }
}
