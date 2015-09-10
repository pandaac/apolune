<?php

namespace Apolune\Guilds\Http\Requests\Overview;

use Illuminate\Foundation\Http\FormRequest;

class SelectRequest extends FormRequest
{
    /**
     * The URI to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirect = '/guilds';

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
            'world' => ['required'],
        ];
    }
}
