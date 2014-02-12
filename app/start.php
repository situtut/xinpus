<?php
require_once './lib/Validator.php';

$validator = new Validator();

if($_POST) {
    $rules = array(
        'first_name' => 'required|alpha|min:3|max:50',
        'last_name' => 'required|alpha|min:3|max:50',
        'email' => 'required|email',
        'username' => 'required|alphaNumeric|min:6|max:20',
        'password' => 'required|password|min:6|max:20',
        '_password' => 'required|sameWith:password',
        'day' => 'required|numeric|nonzero',
        'month' => 'required|numeric|nonzero',
        'year' => 'required|numeric|nonzero',
        'sex' => 'required',
        'major' => 'nonzero',
        'phone' => 'required|numeric',
        'address' => 'required|min:5|max:60',
        'zip' => 'required|numeric|min:5|max:5',
        'height' => 'required|double',
        'hobby' => 'selected:3,5',
    );

    $validator->make($_POST, $rules);

    $validator->validate('age', $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'], 17);
}
