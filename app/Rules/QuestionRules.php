<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;

class QuestionRules implements Rule, DataAwareRule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $data = [];
    protected $message = 'Las :attribute son requeridas';

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $json = json_decode($value, true);
        $valid = 0;

        foreach ($json as $attr) {
            if(!$attr['answer']) {
                return false;
            }

            $valid += $attr['valid'] == true ? 1 : 0;
        }

        if($valid > 1 || $valid == 0) {
            $this->message = 'Debe haber 1 sola respuesta válida.';
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
