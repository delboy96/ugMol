<?php

namespace App\Http\Requests\ArticlesNews;

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
            'body' => ['required', 'min:4', 'max:255'],
            'img' => ['nullable', 'image'],
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
            'body.required' => 'Sadržaj je obavezan.',
            'body.min' => 'Sadržaj mora imati najmanje 4 karaktera.',
            'body.max' => 'Sadržaj može imati najviše 255 karaktera.',
            'img.image' => 'Slika mora biti slika',
        ];
    }
}
