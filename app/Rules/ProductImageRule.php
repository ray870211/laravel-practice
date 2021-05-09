<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductImageRule implements Rule
{
    private $name;
    private $msg;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->mas = $msg;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) //要驗證成功的話要靠這個function
    {
        //
        $this->name = $attribute;  //顯示哪裡出現錯誤
        return preg_match('/^imgs\/\w+\.(png|jpe?g)$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() //沒通過的話錯誤訊息放在這裡
    {
        // return "The validation for $this->name is failed";
        return $this->msg;
    }
}
