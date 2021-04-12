<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Helpers\BannerHolders;

class StoreAdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'holder_id' => ['required','integer',Rule::in(BannerHolders::holders_ids())],
            'title' => ['required','string','max:200'],
            'desc' => ['required','string','max:2000'],
            'date_from' => ['required','date'],
            'date_to' => ['required','date','after:date_from'],
            'duration' => ['required','integer'],
            'frequency' => ['required','integer'],
            'frequency_type' => ['required','string',Rule::in(['h','m'])],
            'image'=>[
                'required',
                'image',
                'max:10000'//size in kb = 10 mb
                // we can set the dimensions here to the bannerholder dimensions if required
            ]
        ];
    }

    public function messages()
    {
        return [
            'holder_id.*' => 'invalid ad holder',
            'frequency_type.*' => 'invalid frequency time'
        ];
    }
}
