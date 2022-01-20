<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FavIcon;
class SettingsRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name' => 'required',
            // General
            'value.site_name' => 'exclude_unless:name,general|required',
            'value.site_title' => 'exclude_unless:name,general|required',
            'value.home_page' => 'exclude_unless:name,general|required',
            'value.site_fav' => [
                'exclude_unless:name,general',
                new FavIcon()
            ],
            // Regestration
            'value.default_role'=> 'exclude_unless:name,registration|required',

        ];
    }

    public function getSettings()
    {
        return [
            'name' => $this->get('name'),
            'value' => serialize($this->get('value'))
        ];
    }
}
