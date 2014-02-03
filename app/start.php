<?php
require_once './lib/Validator.php';

if($_POST) {
    $rules = array(
        'fname' => 'required',
        'lname' => 'required',
        'day' => 'required|numeric',
        'month' => 'required|numeric',
        'year' => 'required|numeric',
        'sex' => 'required',
        'major' => 'required',
        'phone' => 'required|numeric',
        'biodata' => 'min:5',
    );

    $validator = new Validator();

    $validator->make($_POST, $rules);
    if ($validator->error) {
        var_dump($validator->message);
    }
}
