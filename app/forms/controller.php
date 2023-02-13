<?php
//dd(getRequestType());
match (getRequestType()) {
    'registration' => createUserHandler(createUserParams()),
    'login' => authUserHandler(loginUserParams()),
    'create_product' => createProduct(createProductParams()),
    'remove_product' => removeProduct(idProductParams()),
    'edit_product' => editProduct(createProductParams()),
    default => redirect()
};