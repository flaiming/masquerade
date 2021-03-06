<?php

namespace FoF\Masquerade\Validators;

use FoF\Masquerade\Field;
use Flarum\Foundation\AbstractValidator;

class AnswerValidator extends AbstractValidator
{
    /**
     * @param Field $field
     * @return $this
     */
    public function setField(Field $field)
    {
        $rules = [];

        if ($field->required) {
            $rules[] = 'required';
        }

        if ($field->validation) {
            $rules = array_merge($rules, explode('|', $field->validation));
        }

        $this->rules = [$field->name => $rules];

        return $this;
    }
}
