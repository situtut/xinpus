<?php

class Validator {
    protected $error = false;
    protected $message = array();
    protected $inputs = array();

    public function make($inputs, $rules) {
        $this->inputs = $inputs;
        foreach($rules as $key => $rule) {
            $this->map(@$inputs[$key], $rule, $key);
        }
    }

    protected function map($input, $rule, $key) {
        $rule = explode('|', $rule);
        foreach ($rule as $q => $value) {
            if (count(explode(':', $value)) > 1) {
                $func = explode(':', $value)[0];
                $this->$func($input, explode(':', $value)[1], $key);
            } else {
                $this->$value($input, $key);
            }
        }
    }

    protected function required($input, $key) {
        if (strlen($input) == 0) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' is required';
        }
    }

    protected function alpha($input, $key) {
        if (is_numeric($input)) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' should be a character';
        }
    }

    protected function alphaNumeric($input, $key) {
        if (! preg_match('/^[A-Za-z0-9]+$/', $input)) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' should be an alpha numeric';
        }
    }

    protected function sameWith($input, $field, $key) {
        if ($this->inputs[$field] != $input) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' should be same with ' . $field;
        }
    }

    protected function password($input, $key) {
        if (! preg_match("#[a-z]+#", $input)) {
            $this->error = true;
            $this->message[$key] = 'Your '.$key.' should have at least one alphabet character';
            return;
        }

        if (! preg_match("#[0-9]+#", $input)) {
            $this->error = true;
            if(! isset($this->message[$key])) $this->message[$key] = array();
            $this->message[$key] = 'Your '.$key.' should have at least one numerical character';
            return;
        }

        if (! preg_match("#[A-Z]+#", $input)) {
            $this->error = true;
            if(! isset($this->message[$key])) $this->message[$key] = array();
            $this->message[$key] = 'Your '.$key.' should have at least one uppercase letter';
            return;
        }

        if (! preg_match('![^a-z0-9]!i', $input)) {
            $this->error = true;
            $this->message[$key] = 'Your '.$key.' should have at least one special character';
            return;
        }
    }

    protected function email($input, $key) {
        if (! filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' should be a valid email address';
        }
    }

    protected function nonzero($input, $key) {
        if ($input == '0') {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' should not be empty';
        }
    }

    protected function numeric($input, $key) {
        if (! is_numeric($input)) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' is not a numeric value';
        }
    }

    protected function min($input, $min, $key) {
        $options = array(
            'options' => array(
                'min_range' => $min,
            )
        );

        // it can be zero, if not zero do the validation
        if (! filter_var(strlen($input), FILTER_VALIDATE_INT, $options)) {
            $this->error = true;
            $this->message[$key] = 'The minimum character of '.$key.' is ' . $min;
        }
    }

    protected function max($input, $max, $key) {
        $options = array(
            'options' => array(
                'max_range' => $max,
            )
        );

        // it can be zero, if not zero do the validation
        if (! filter_var(strlen($input), FILTER_VALIDATE_INT, $options)) {
            $this->error = true;
            $this->message[$key] = 'The maximum character of '.$key.' is ' . $max;
        }
    }

    public function fail() {
        return $this->error;
    }

    public function messages() {
        return $this->message;
    }

    public function validate($type, $input, $min) {
        $diff = date_diff(new DateTime($input), new DateTime(date('Y-m-d')));

        $options = array(
            'options' => array(
                'min_range' => $min,
            )
        );

        // it can be zero, if not zero do the validation
        if (! filter_var($diff->y, FILTER_VALIDATE_INT, $options)) {
            $this->error = true;
            $this->message[$type] = 'Your '.$type.' must be older that is ' . $min;
        }
    }

    protected function double($input, $key) {
        if (! is_double($input)) {
            $this->error = true;
            $this->message[$key] = 'Field '.$key.' should be a double value';
        }
    }

    protected function selected($input, $range, $key) {
        $options = explode(',', $range);
        $minimum = (isset($options[0])) ? $options[0] : null;
        $maximum = (isset($options[1])) ? $options[1] : null;
        if (isset($minimum) and count($input) < $minimum) {
            $this->error = true;
            $this->message[$key] = 'You must select '.$key.' at least ' . $minimum . ' selected options';
            return;
        }

        if (isset($maximum) and count($input) > $maximum) {
            $this->error = true;
            $this->message[$key] = 'Maximum selected '.$key.' is ' . $maximum;
            return;
        }
    }

    public function first($message) {
        return (isset($this->message[$message])) ? $this->message[$message] : false;
    }
}
