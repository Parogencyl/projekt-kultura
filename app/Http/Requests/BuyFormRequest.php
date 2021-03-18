<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyFormRequest extends FormRequest
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
        return [
            'email' => 'required|email|max:80',
            'name' => 'required|alpha|max:30',
            'surname' => 'required|alpha|max:50',
            'phone' => 'required|max:15',
            'street' => 'nullable|string|max:50',
            'numberOfFlat' => 'nullable|max:12',
            'city' => 'nullable|string|max:50',
            'zip' => 'nullable|regex:/^([0-9]{2})(-[0-9]{3})?$/',
            'company' => 'nullable|string|max:80',
            'nip' => 'nullable|string|max:15',
            'regulamin' => 'accepted',
      ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Należy wypełnić podane pole.',
            'email.email' => 'Podany adres nie jest poprawnym adresem email.',
            'email.max' => 'Adres email jest zbyt długi.',
            'name.required' => 'Należy wypełnić podane pole.',
            'name.alpha' => 'Imie nie może składać się z cyfr.',
            'name.max' => 'Maksymalna liczba znaków wynosi 30.',
            'surname.required' => 'Należy wypełnić podane pole.',
            'surname.alpha' => 'Nazwisko nie może składać się z cyfr.',
            'surname.max' => 'Maksymalna liczba znaków wynosi 50.',
            'street.max' => 'Zbyt duża liczba znaków.',
            'numberOfFlat.max' => 'Zbyt duża liczba znaków.',
            'city.max' => 'Zbyt duża liczba znaków.',
            'zip.max' => 'Maksymalna liczba znaków wynosi 6.',
            'zip.min' => 'Minimalna liczba znaków wynosi 6.',
            'zip.regex' => 'Kod pocztowy powinien zostać zapisany w formie: 00-000',
            'phone.required' => 'Należy wypełnić podane pole.',
            'phone.max' => 'Zbyt duża liczba znaków.',
            'company.max' => 'Zbyt duża liczba znaków.',
            'nip.max' => 'Zbyt duża liczba znaków.',
            'ragulamin.accepted' => 'W celu kontynuacji należy zaakceptować regulamin seriwsu.',
        ];
    }
}
