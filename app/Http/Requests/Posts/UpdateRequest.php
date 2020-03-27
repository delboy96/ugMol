<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'min:3', 'max:255'],
            'subtitle' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:4', 'max:255'],
            'citat' => ['max:255'],
            'datum' => ['required'],
            'img' => ['nullable', 'image'],
        ];

        if (!$this->has('id'))
        {
            $rules += ['id'=> 'exists:posts', 'integer'];
        }

        return $rules;
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
            'img_path.max' => 'Putanja slike može imati najviše 255 karaktera.',
            'id.exists' => 'Id mora da postoji.',
            'id.integer' => 'Id mora biti integer.',
            'img.image' => 'Slika mora biti u formatu slike.',
        ];
    }
}
