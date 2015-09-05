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

        $rules = [
            'from_day'      => ['required', 'in:'.$days],
            'from_month'    => ['required', 'in:'.$months],
            'from_year'     => ['required', 'in:'.$years],
            'to_day'        => ['required', 'in:'.$days],
            'to_month'      => ['required', 'in:'.$months],
            'to_year'       => ['required', 'in:'.$years],
        ];

        return array_merge($rules, $this->types(), $this->icons());
    }

    /**
     * Create the type rules.
     *
     * @param  array  $rules  []
     * @return array
     */
    protected function types($rules = [])
    {
        foreach ($this->get('type') as $identifier => $type) {
            $rules[sprintf('type.%d', $identifier)] = 'in:news,article,ticker';
        }

        return $rules;
    }

    /**
     * Create the icon rules.
     *
     * @param  array  $rules  []
     * @return array
     */
    protected function icons($rules = [])
    {
        foreach ($this->get('icon') as $identifier => $icon) {
            $rules[sprintf('icon.%d', $identifier)] = 'in:staff,community,development,support,technical';
        }

        return $rules;
    }
}
