<?php
function createProduct(array $fields)
{
    createProductValidation($fields);
    dd($fields);
}

function createProductValidation(array $fields): void
{
    updateSessionFields('create_product', $fields);

    unset($fields['description']);

    $isEmptyFields = emptyFields($fields, 'create_product');

}

function validateProductDataOnZero(float $price, int $quantity): bool
{

    return true;
}
