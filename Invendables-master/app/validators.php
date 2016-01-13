<?php namespace App;

/** @var \Illuminate\Validation\Factory $validator */

$validator->extend(
    'valid_password',
    function ($attribute, $value, $parameters)
    {
        return preg_match('/^[a-zA-Z0-9!@#$%\/\^&\*\(\)\-_\+\=\|\[\]{}\\\\?\.,<>`\'":;]+$/u', $value);
    }
);

$validator->extend(
    'phone_number',
    function ($attribute, $value, $parameters)
    {
        return preg_match('/^0[1-9]([-. ]?\d{2}){4}$/', $value);
    }
);

$validator->extend(
    'postal_code',
    function ($attribute, $value, $parameters)
    {
        return preg_match('/^[0-9]{5}$/', $value);
    }
);

$validator->extend(
    'siren',
    function ($attribute, $value, $parameters)
    {
        if (strlen($value) != 9) return false; 
        if (!is_numeric($value)) return false; 
        $sum = 0;
        for ($index = 0; $index < 9; $index ++)
        {
            $number = (int) $value[$index];
            if (($index % 2) != 0) { if (($number *= 2) > 9) $number -= 9; }
            $sum += $number;
        }

        if (($sum % 10) != 0) return false; else return true;      
    }

);

$validator->extend(
    'alpha_num_sp',
    function ($attribute, $value, $parameters)
    {
        return preg_match('~^(?=.*[^\W_])[\p{L} ]*$~u', $value);
    }
);

$validator->extend(
    'alpha_sp',
    function ($attribute, $value, $parameters)
    {
        return preg_match('/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/', $value);
    }
);


