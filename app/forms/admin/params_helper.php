<?php
function createProductParams(): array
{
    $options = [
        'name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string',
        ],
        'description' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'price' => FILTER_VALIDATE_FLOAT,
        'quantity' => FILTER_VALIDATE_INT,
        'is_main' => FILTER_VALIDATE_BOOLEAN,
        'image_url' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
    ];

    return filter_input_array(INPUT_POST, $options);
}

function idProductParams()
{
    return filter_input(INPUT_POST, 'product_id',FILTER_VALIDATE_INT);
}