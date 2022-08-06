<?php

namespace validator;

class validator
{
    public static function is_require($value)
    {
        if ($value != null) {
            return array('value' => true, 'message' => 'Value exist.');
        } else {
            return array('value' => false, 'message' => 'Empty value');
        }
    }

    public static function is_email($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return array('value' => false, 'message' => 'invalid email');
        } else {
            return array('value' => true, 'message' => 'email varified');
        }
    }
}
