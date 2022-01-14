<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public $fieldsForValidation = array(
        'general' => [
            'value.site_name' => 'required',
            'value.site_title' => 'required',
         ],
         'registration' => [
            'value.default_role'=> 'required',
         ]
    );
    public $selectedFieldsForValidation = array();
    
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if (!empty($this->get('name'))) {
            $this->selectedFieldsForValidation = (isset($this->fieldsForValidation[$this->get('name')])) ? $this->fieldsForValidation[$this->get('name')] : array();            
        }

        $this->selectedFieldsForValidation['name'] = 'required';

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->selectedFieldsForValidation;
    }

    public function getSettings()
    {
        return [
            'name' => $this->get('name'),
            'value' => serialize($this->get('value'))
        ];
    }
}
