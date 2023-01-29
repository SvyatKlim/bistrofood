<?php

function createUserParams(): array
{
    $options = [
        'name' => [
          'flags' => FILTER_CALLBACK,
          'filter' => 'is_string'
        ],
        'last_name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
    ];

    return filter_input_array(INPUT_POST, $options);
}