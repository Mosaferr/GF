<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
        return [
            'name' => 'required|string|alpha|min:3|max:20',
            'last_name' => 'required|string|alpha|min:2|max:50',
            'phone' => 'nullable|regex:/^\+?[0-9\s]+$/|min:8|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user,
            'password' => 'required|confirmed|min:8',
            'participants' => ['required', 'integer', 'min:1'],
            'trip' => 'required|exists:trips,id',
            'start_date' => 'required|exists:dates,id',
            // 'password' => [
            //     'required',
            //     'confirmed',
            //     Password::min(8)           // Minimalna długość
            //         ->mixedCase()          // Wymaga wielkich i małych liter
            //         ->symbols()            // Wymaga znaków specjalnych
            //         ->numbers()            // Wymaga cyfr
            //         ->uncompromised(),     // Sprawdza, czy hasło nie zostało skompromitowane
            // ],
        ];
    }
}
