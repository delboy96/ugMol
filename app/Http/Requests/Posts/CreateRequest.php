<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255'],
            'subtitle' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:4', 'max:255'],
            'citat' => ['max:255'],
            'datum' => ['required'],
            'img' => ['nullable', 'image', 'max:1024'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Naslov je obavezan.',
            'title.min' => 'Naslov mora imati najmanje 3 karaktera.',
            'title.max' => 'Naslov može imati najviše 255 karaktera.',
            'subtitle.required' => 'Prezime je obavezno.',
            'subtitle.min' => 'Prezime mora imati najmanje 3 karaktera.',
            'subtitle.max' => 'Prezime može imati najviše 255 karaktera.',
            'body.required' => 'Sadržaj je obavezan.',
            'body.min' => 'Sadržaj mora imati najmanje 3 karaktera.',
            'body.max' => 'Sadržaj može imati najviše 255 karaktera.',
            'citat.max' => 'Citat može imati najviše 255 karaktera.',
            'datum.required' => 'Datum je obavezan.',
            'img.image' => 'Slika mora biti slika',
            'img.max' => 'Slika ne sme biti veća od 1mb.'
        ];
    }
}
