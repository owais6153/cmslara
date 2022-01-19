<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ShortDescription;
class BlogRequest extends FormRequest
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
            'status' => 'required',
            'user_id' => 'required',
            'short_description' => [
                new ShortDescription(),
            ]
        ];
    }

    public function getBlogData()
    {
        if (($this->has('old_slug') && $this->get('old_slug') != $this->get('slug')) || !$this->has('old_slug')) {
            $this->merge(['slug' => prepareSlug(app('App\Models\Blog'), $this->get('slug'))]);
        }


        return [
            'name' => $this->get('name'),
            'slug' =>  \Str::slug($this->get('slug')),
            'template' => $this->get('template'),
            'status' => $this->get('status'),
            'description' => ($this->has('description')) ? $this->get('description') : null ,
            'short_description' => ($this->has('short_description')) ? $this->get('description') : null,
            'user_id' => $this->get('user_id') ,
            'featured_image' => ($this->has('featured_image')) ? $this->get('featured_image') : null ,
        ];
    }
}
