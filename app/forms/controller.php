<?php
//dd(getRequestType());
match (getRequestType()) {
    'registration' => createUserHandler(createUserParams()),
    'login' => authUserHandler(loginUserParams()),
    'create_product' => createProduct(createProductParams()),
    default => redirect()
};