<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MegaBytes implements Rule
{
    
    protected $param;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        $this->param = $param;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $megaBytes = $value->getSize() / 1024 / 1024;

        return $megaBytes <= $this->param;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.max_mb', ['max_mb' => $this->param]);
        return 'The validation error message.';
    }
}
