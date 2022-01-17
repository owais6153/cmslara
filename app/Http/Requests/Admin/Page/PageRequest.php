<?php

namespace App\Http\Requests\Admin\Page;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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

    protected $prepareRules = array();
    protected function prepareForValidation()
    {
        if ($this->has('old_slug') && $this->get('old_slug') == $this->get('slug')) {
            $this->prepareRules = [
                'name' => 'required',
                'slug' => 'required',
                'template' => 'required',
                'status' => 'required',
            ];
        }
        else{
            $this->prepareRules = [
                'name' => 'required',
                'slug' => 'required|unique:pages',
                'template' => 'required',
                'status' => 'required',
            ];
        }

    }

    public function rules()
    {
        return $this->prepareRules;
    }

    public function getPageData()
    {
        return [
            'name' => $this->get('name'),
            'slug' => \Str::slug($this->get('slug')),
            'template' => $this->get('template'),
            'status' => $this->get('status'),
            'description' => ($this->has('description')) ? $this->get('description') : null ,
            'short_description' => ($this->has('short_description')) ? $this->get('description') : null,
        ];
    }
}
