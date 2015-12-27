<?php

namespace Apolune\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
        $days   = implode(',', range(1, 31));
        $months = implode(',', range(1, 12));
        $years  = implode(',', range(2000, date('Y')));

        return [
            'from_day'      => ['required', 'in:'.$days],
            'from_month'    => ['required', 'in:'.$months],
            'from_year'     => ['required', 'in:'.$years],
            'to_day'        => ['required', 'in:'.$days],
            'to_month'      => ['required', 'in:'.$months],
            'to_year'       => ['required', 'in:'.$years],
            'type.*'        => 'in:news,article,ticker',
            'icon.*'        => 'in:staff,community,development,support,technical',
        ];
    }
}
