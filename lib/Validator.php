<?php

class Validator {
    var $error = false;
    var $message = array();

    public function make($inputs, $rules) {
        foreach($inputs as $key => $input) {
            if (isset($rules[$key])) {
                $this->map($input, $rules[$key], $key);
            }
        }
    }

    private function map($input, $rule, $key) {
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

    private function required($input, $key) {
        if (strlen($input) == 0) {
            $this->error = true;
            if(! isset($this->message[$key])) $this->message[$key] = array();
            array_push($this->message[$key], 'This '.$key.' is required');
        }
    }

    private function numeric($input, $key) {
        if (! is_numeric($input)) {
            $this->error = true;
            if(! isset($this->message[$key])) $this->message[$key] = array();
            array_push($this->message[$key], 'Your '.$key.' is not a numeric value');
        }
    }

    private function min($input, $min, $key) {
        // if min = 0, so this field is required
        if ($min == 0) { return $this->required($input, $key); }

        // it can be zero, if not zero do the validation
        if (strlen($input) != 0 and strlen($input) < $min) {
            $this->error = true;
            $this->message[$key] = 'The minimum character of '.$key.' is ' . $min;
        }
    }
}
