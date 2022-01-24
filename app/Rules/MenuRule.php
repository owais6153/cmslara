<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MenuRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    public $msg = '';
    public function passes($attribute, $value)
    {
        $ret = false;
        $menus = json_decode($value, true);
        foreach ($menus as $key => $menu) {
            if (isset($menu['label']) && strlen($menu['label']) > 100){
                $this->msg = 'Title should be less then 100 char';
                $ret = false;
                break;
            }
            else if (isset($menu['url']) && strlen($menu['url']) > 255){
                $this->msg = 'Url should be less then 255 char';
                $ret = false;
                break;
            }
            else if (isset($menu['attr_class']) && strlen($menu['attr_class']) > 80){
                $this->msg = 'Class attr should be less then 80 char';
                $ret = false;
                break;
            }
            else if (isset($menu['attr_id']) && strlen($menu['attr_id']) > 80){
                $this->msg = 'ID attr should be less then 255 char';
                $ret = false;
                break;
            }
            else{
               $ret = true; 
            }
        }
        return $ret;


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
