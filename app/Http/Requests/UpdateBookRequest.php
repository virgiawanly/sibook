<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
            'description' => ['nullable', 'string', 'max:255'],
            'language' => ['nullable', 'string', 'max:255'],
            'pages' => ['nullable', 'numeric'],
            'year' => ['nullable', 'numeric'],
            'edition' => ['nullable', 'string', 'max:255'],
            'size' => ['nullable', 'string'],
            'weight' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric'],
            'stock' => ['nullable', 'numeric'],
            'status' => ['required', 'boolean'],
        ];
    }
}
