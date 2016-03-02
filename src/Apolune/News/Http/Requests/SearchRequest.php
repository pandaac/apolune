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
        return [
            'from_day'      => ['required', 'in:'.$this->getDayRange()],
            'from_month'    => ['required', 'in:'.$this->getMonthRange()],
            'from_year'     => ['required', 'in:'.$this->getYearRange()],
            'to_day'        => ['required', 'in:'.$this->getDayRange()],
            'to_month'      => ['required', 'in:'.$this->getMonthRange()],
            'to_year'       => ['required', 'in:'.$this->getYearRange()],
            'type'          => ['required'],
            'category'      => ['required'],
            'type.*'        => ['in:news,article,ticker'],
            'category.*'    => ['in:staff,community,development,support,technical'],
        ];
    }

    /**
     * Comma separate the range of allowed days.
     *
     * @return string
     **/
    protected function getDayRange()
    {
        return implode(',', range(1, 31));
    }

    /**
     * Comma separate the range of allowed months.
     *
     * @return string
     **/
    protected function getMonthRange()
    {
        return implode(',', range(1, 12));
    }

    /**
     * Comma separate the range of allowed years.
     *
     * @return string
     **/
    protected function getYearRange()
    {
        return implode(',', range(date('Y') - 15, date('Y')));
    }
}
