<?php

namespace Apolune\Library\Http\Requests\Spells;

use Illuminate\Foundation\Http\FormRequest as BaseRequest;

class FormRequest extends BaseRequest
{
    /**
     * The URI to redirect to if validation fails.
     *
     * @var string
     */
    protected $redirect = '/library/spells';

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
        $vocations = vocations(true)->map(function (&$vocation) {
            $vocation = $vocation->id();
        })->keys()->implode(',');

        return [
            'vocation'  => ['required', 'in:all,'.$vocations],
            'group'     => ['required', 'in:all,attack,healing,support'],
            'type'      => ['required', 'in:all,instant,conjure,rune'],
            'premium'   => ['required', 'in:all,no,yes'],
            'sort'      => ['required', 'in:name,group,type,level,mana,premium'],
        ];
    }
}
