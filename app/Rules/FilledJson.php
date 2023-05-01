<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;

class FilledJson implements Rule, DataAwareRule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $isChallenge = $this->isChallenge();

        if($isChallenge) {
            return $this->challengeVisiblity($value);
        }

        if(!$isChallenge) {
            $json = json_decode($value, true);

            foreach ($json as $attr) {
                if(!$attr) {
                    return false;
                }
            }
        }

        return true;
    }

    public function challengeVisiblity($value) {
        if($this->data['challenge_type'] == 'visibility') {
            $json = json_decode($value, true);

            foreach ($json as $values) {
                foreach ($values as $attr) {
                    if(!$attr) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    public function isChallenge() {
        return isset($this->data['challenge_type']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Los campos de :attribute son requeridos';
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
