<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ShortDescription;
class CategoryRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        if(!$this->has('slug')){
            $this->merge(['slug' => \Str::slug($this->get('name'))]);
        }        

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'description' => [
                new ShortDescription(),
            ]
        ];
    }
    public function getCategoryData()
    {
        if (($this->has('old_slug') && $this->get('old_slug') != $this->get('slug')) || !$this->has('old_slug')) {
            $this->merge(['slug' => prepareSlug(app('App\Models\Category'), $this->get('slug'))]);
        }


        return [
            'name' => $this->get('name'),
            'slug' =>  \Str::slug($this->get('slug')),
            'description' => ($this->has('description')) ? $this->get('description') : null ,
        ];
    }
}
