<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\RawMaterial;
use App\Enums\StoneColor;

class DesignAadhaarUpdateRequest extends FormRequest
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
            'picture' => 'mimetypes:image/jpeg,image/png|image|max:8192',
            'design_no' => 'integer|unique:designs',
            'stones.*.size' => 'required',
            'stones.*.stone_type' => [
                'required',
                Rule::in(RawMaterial::getStoneTypes())
            ],
            'stones.*.stone_color' => [
                'required',
                Rule::in(StoneColor::getAllColors())
            ],
            'stones.*.quantity.*' => 'integer',
            'stones.*.stone_price' => 'required',
            'stones.*.labour_charge' => 'required',
            'rhodium' => 'required',
            'misc_price' => 'required',
            'markup_percentage' => 'required',
        ];

        return $rules;
    }
}
